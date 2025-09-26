<?php

namespace App\Http\DTOs;

class PatientData
{
    public string $first_name;
    public string $last_name;
    public ?string $document_type;
    public ?string $document_number;
    public ?string $date_of_birth;
    public ?string $gender;
    public ?string $email;
    public ?string $phone;
    public ?string $address;
    public ?int $province_id;
    public ?int $municipality_id;
    public ?string $postal_code;
    public ?string $notes;

    public function __construct(array $data)
    {
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->document_type = $data['document_type'] ?? null;
        $this->document_number = $data['document_number'] ?? null;
        $this->date_of_birth = $data['date_of_birth'] ?? null;
        $this->gender = $data['gender'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->phone = $data['phone'] ?? null;
        $this->address = $data['address'] ?? null;
        $this->province_id = $data['province_id'] ?? null;
        $this->municipality_id = $data['municipality_id'] ?? null;
        $this->postal_code = $data['postal_code'] ?? null;
        $this->notes = $data['notes'] ?? null;
    }

    public static function fromRequest(array $data): self
    {
        return new self($data);
    }

    public function toArray(): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'document_type' => $this->document_type,
            'document_number' => $this->document_number,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'province_id' => $this->province_id,
            'municipality_id' => $this->municipality_id,
            'postal_code' => $this->postal_code,
            'notes' => $this->notes,
        ];
    }
}
