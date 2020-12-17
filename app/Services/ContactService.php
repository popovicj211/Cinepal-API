<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Contracts\ContactContract;
use App\DTO\ContactDTO;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\PaginateRequest;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ContactService extends BaseService implements ContactContract
{


   public function getContact(PaginateRequest $request): array
   {
       $contact = Contact::query();
       $page = $request->get('page');
       $perPage = $request->get('perPage');

       $contactPag  = $this->generatePagedResponse($contact, $perPage , $page);
       $contactCount = DB::table('contact')->count();

       $contactArr = [];

       foreach ($contactPag['data'] as $contact)
       {
           $contactDTO = new ContactDTO();
           $contactDTO->id = $contact->id;
           $contactDTO->name = $contact->name;
           $contactDTO->email = $contact->email;
           $contactDTO->subject = $contact->subject;
           $contactDTO->message = $contact->message;
           $contactArr[] = $contactDTO;
       }

       return array('data' => $contactArr , 'count' => $contactCount);
   }

   public function findContact(int $id): ContactDTO
   {
       $contact = Contact::findOrFail($id);
       if($contact != null) {
           $contactDTO = new ContactDTO();
           $contactDTO->id = $contact->id;
           $contactDTO->name = $contact->name;
           $contactDTO->email = $contact->email;
           $contactDTO->subject = $contact->subject;
           $contactDTO->message = $contact->message;
           return $contactDTO;
       }
   }

   public function addContact(ContactRequest $request)
   {

       $name = $request->get('contName');
       $email = $request->get('contEmail');
       $subject = $request->get('contSubject');
       $message = $request->get('contMessage');
       $contact = Contact::create([
           'name' => $name,
           'email' => $email,
           'subject' => $subject,
           'message' => $message
       ]);

       $contact->save();
   }

   public function modifyContact(Request $request , int $id)
   {
        $request->validate([
               'contName' => 'required|min:3|max:250',
                'contEmail' => 'required|email|unique:contact,email',
               'contSubject'=> 'required|min:3',
               'contMessage' => 'required|min:5'
        ]);

       $name = $request->get('contName');
       $subject = $request->get('contSubject');
       $message = $request->get('contMessage');
       $contact = Contact::findOrFail($id);

       $contact->update([
           'name' => $name,
           'subject' => $subject,
           'message' => $message,
           'updated_at' => Carbon::now()->toDateTime()
       ]);
   }

   public function deleteContact(int $id)
   {
       $contact = Contact::findOrFail($id);

       if ($contact != null ) {
           $contact->delete();
       }
   }

}
