<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeetingsModel;
use App\Models\UsersModel;
use Carbon\Carbon;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Google\Client as GoogleClient;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class MeetingsController extends Controller
{

    public function list(Request $request)
    {
        $query = MeetingsModel::with(['engineer_data', 'user_data'])
            ->orderByDesc('created_at');

        $sum        = $query->count("id");
        $meetings  = $query->paginate(100);

        return view('admin.meetings.list', compact('meetings', 'sum'));
    }


    public function create(Request $request)
    {
        $valid_token = true;
        if ($this->refreshToken() == null) {
            $valid_token = false;
            // Save the current URL in the session
            session(['previous_url' => url()->current()]);
        }

        if (empty($request->client_id)) {
            return abort(Response::HTTP_NOT_FOUND);
        }

        $client_id = $request->client_id;
        $user = UsersModel::find($client_id);
        return view('admin.meetings.create', compact('client_id', 'user', 'valid_token'));
    }

    public function create_action(Request $request)
    {
        $rules = array(
            'title' => 'required',
            // 'describtion' => 'required',
            'date' => 'required',
            'time' => 'required',
        );

        $messages = [
            'title.required' => __('title_required'),
            // 'describtion.required' => __('describtion_required'),
            'date.required' => __('date_required'),
            'time.required' => __('time_required')
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails() == false) {

            $client = UsersModel::find($request->client_id);

            $user_input_time = "$request->date $request->time";

            // Parse the user input as a Carbon instance (assuming it's in 'Y-m-d H:i:s' format)
            $carbonInstance = Carbon::parse($user_input_time);

            // Format the Carbon instance to the desired format
            $formattedDateTime = $carbonInstance->toIso8601ZuluString();
            // dd($client->email);

            $meet_link = $this->generateGoogleMeetEvent(
                $request->title,
                $request->describtion ?? "",
                $formattedDateTime,
                $client->email
            );

            if ($meet_link == null) {
                return redirect()->route('admin.google.request.token');
            } else {

                // save the meeting in database 
                $meeting                = new MeetingsModel();
                $meeting->title         = $request->title;
                $meeting->description   = $request->description;
                $meeting->engineer_id   = $request->user()->id;
                $meeting->user_id       = $client->id;
                $meeting->meet_date     = $user_input_time;
                $meeting->meeting_link  = $meet_link;

                if ($meeting->save()) {
                    return redirect()->route('admin.meeting.list')->with(['success' => __('added_successfuly')]);
                } else {
                    return back()
                        ->withErrors(['error' => __('unable_to_add')])
                        ->withInput($request->all());
                }

                // dd($meet_link);
            }
        } else {

            $error     = $validator->errors();
            $allErrors = "";

            foreach ($error->all() as $err) {
                $allErrors .= $err . " <br/>";
            }

            return back()
                ->withErrors(['error' => $allErrors])
                ->withInput($request->all());
        }
    }

    public function cancel_meeting()
    {
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->scopes([
                'https://www.googleapis.com/auth/calendar',
                'https://www.googleapis.com/auth/calendar.events'
            ])
            //->with(['access_type' => 'offline']) // Include this line to request a refresh token
            ->with(["access_type" => "offline", "prompt" => "consent select_account"]) //, "prompt" => "consent select_account"])
            ->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {

        try{

            $user = Socialite::driver('google')->user();

            // The user's access token
            $accessToken  = $user->token;
            $refreshToken = $user->refreshToken;

            // Store the access token securely for later use
            $user_data = UsersModel::where(['id' => auth()->user()->id])->first();
            $user_data->googleRefreshToken = $refreshToken;
            $user_data->update();
            
        }catch(Exception $ex){

        }

        // Redirect or perform other actions
        if (session()->has('previous_url')) {

            $previousUrl = session('previous_url');
            session()->forget('previous_url'); // forget it

            return redirect($previousUrl);
        } else {

            // check user type
            if (Auth::guard('admin')->check()) // this means that the admins was logged in.
            {
                return redirect()->route('admin.meeting.list');
            }else if (Auth::guard('supervisor')->check()) {
                return redirect()->route('supervisor.meeting.list');
            }else{
                return redirect()->route('engineer.meeting.list');
            }
        }
    }

    public function refreshToken()
    {

        $refreshToken = auth('admin')->user()->googleRefreshToken; // "1//03nXbigO2IhOtCgYIARAAGAMSNwF-L9IrYN92rLJvB6X8kKDMol2-hriNpT_x76_F6GzWKO8JVYlGOXulnzjQL3PQIfjqeBdDNyM";        

        $response = Http::asForm()
            ->post('https://oauth2.googleapis.com/token', [
                'refresh_token' => $refreshToken,
                'client_id' => env('GOOGLE_CLIENT_ID'),
                'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                'grant_type' => 'refresh_token',
            ]);

        $data = $response->json();

        if (isset($data['access_token'])) {
            $newAccessToken = $data['access_token'];

            // You can store and use the new access token
        }

        if (isset($data['refresh_token'])) {
            $newRefreshToken = $data['refresh_token'];

            // Optionally, you can update and store the refresh token
        }

        // dd(@$newRefreshToken ?? null , @$newAccessToken ?? null);

        if (empty($newAccessToken)) {
            return null;
        }

        return $newAccessToken;
    }

    // this need to improve
    public function generateGoogleMeetLink()
    {
        // more info in this link
        // https://developers.google.com/resources/api-libraries/documentation/calendar/v3/php/latest/class-Google_Service_Calendar_Event.html
        $yourAccessToken = $this->refreshToken();
        // dd($yourAccessToken);

        $client = app(GoogleClient::class);
        $client->setAccessToken($yourAccessToken); // Replace with the access token for the user who creates the meeting.        

        $eventStartTime = new \Google\Service\Calendar\EventDateTime();
        $eventStartTime->setDateTime('2023-10-27T10:00:00');
        $eventStartTime->setTimeZone('Asia/Riyadh');

        $eventEndTime = new \Google\Service\Calendar\EventDateTime();
        $eventEndTime->setDateTime('2023-10-27T11:00:00');
        $eventEndTime->setTimeZone('Asia/Riyadh');

        $calendarService = new \Google_Service_Calendar($client);

        $conferanceRequest = new \Google_Service_Calendar_CreateConferenceRequest();
        $conferanceRequest->setRequestId('ahmed' . time());

        $conferanceData  = new \Google_Service_Calendar_ConferenceData();
        // $conferanceData->setConferenceId("ahmed" . time());
        $conferanceData->setCreateRequest($conferanceRequest);

        $event = new \Google_Service_Calendar_Event();
        $event->setSummary('Meeting Title');
        $event->setDescription('Meeting Description');
        $event->setStart($eventStartTime);
        $event->setEnd($eventEndTime);
        $event->setConferenceData($conferanceData);

        // dd($event);

        $calendar_id = "primary"; // "ahmedadmnagem@gmail.com"; // primary
        $event = $calendarService->events->insert($calendar_id, $event, [
            'conferenceDataVersion' => 1,
        ]);

        return $event->getHangoutLink();
        // return $event->getConferenceData();
    }


    public function generateGoogleMeetEvent($title, $description, $start_time, $attendees_email)
    {
        // Parse the given time as a Carbon instance
        $carbonInstance = Carbon::parse($start_time);
        // Add 1 hour to the Carbon instance
        $end_time = $carbonInstance->addHour();
        $end_time = $end_time->toIso8601ZuluString();

        // $start_time = '2023-10-27T15:00:00';
        // $end_time = '2023-10-27T16:00:00';

        $start_time = str_replace('Z', '', $start_time);
        $end_time   = str_replace('Z', '', $end_time);

        //print($end_time);
        // dd($end_time->toDateTimeString());

        $yourAccessToken = $this->refreshToken();

        if ($yourAccessToken == null) {
            return null;
        }

        $client = app(GoogleClient::class);
        $client->setAccessToken($yourAccessToken); // Replace with the access token for the user who creates the meeting.        
        $service = new \Google_Service_Calendar($client);

        $event = new \Google_Service_Calendar_Event(array(
            'summary' => $title,
            'location' => 'https://alojian.com',
            'description' => $description,
            'start' => array(
                'dateTime' => $start_time,
                'timeZone' => 'Asia/Riyadh',
            ),
            'end' => array(
                'dateTime' => $end_time,
                'timeZone' => 'Asia/Riyadh',
            ),
            'recurrence' => array(
                'RRULE:FREQ=DAILY;COUNT=1'
            ),
            'attendees' => array(
                array('email' => $attendees_email),
            ),
            'reminders' => array(
                'useDefault' => FALSE,
                'overrides' => array(
                    array('method' => 'email', 'minutes' => 24 * 60),
                    array('method' => 'popup', 'minutes' => 30),
                ),
            ),
            'conferenceData' => [
                'createRequest' => [
                    'requestId' => 'ahmedMeet' . time() // TODO: improve this later
                ]
            ]
        ));

        // dd($event);

        $calendarId = 'primary';
        $event = $service->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);
        return $event->getHangoutLink();
    }
}
