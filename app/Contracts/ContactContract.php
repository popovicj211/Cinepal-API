<?php


namespace App\Contracts;


use App\DTO\ContactDTO;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\PaginateRequest;
use Illuminate\Http\Request;
interface ContactContract
{
        public function getContact(PaginateRequest $request): array ;
        public function findContact(int $id): ContactDTO;
        public function addContact(ContactRequest $request);
        public function modifyContact(Request $request ,int $id);
        public function deleteContact(int $id);
}
