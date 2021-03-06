<?php namespace App\Http\Controllers;
use Event;
use App\Events\MessageWasSended;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MessageRepository;
use Validator;
use Illuminate\Http\Request;

class MessageController extends ApiController {

    protected $messageRepository;
    
    function __construct(MessageRepository $messageRepository)
        {
            $this->messageRepository = $messageRepository;
        }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$response = $this->messageRepository->getAllMessagesForUser(Auth::user());
		
        if(!$response)
        {
            return $this->respondNotFound('No message');
        }
        /*
        return $this->respond([
            'data' => $response->toArray()
        ]);
         */
        return $this->respond($response->toArray());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'taxi_id' => 'required',
			'latitude' => 'required',
			'longitude' => 'required'
		]);

		if($validator->fails())
        {	    
            return $this->setStatusCode(422)->respondWithError('Parameter failed validation');
        }
        
        $messageToSend = $request->only('taxi_id','latitude','longitude');
        $response = Event::fire(new MessageWasSended(Auth::user(),$messageToSend));
        /*
        if(!$response)
        {
            return $this->setStatusCode(422)->respondWithError('Failed to send message');
        }
        */
        return $this->respondCreated('Successfully sended');
        
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
