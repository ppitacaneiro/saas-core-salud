<?php

namespace App\Http\DTOs;

class TenantData
{
    public string $id;
    public string $name;
    public string $contactEmail;
    public ?string $phone;
    public ?string $address;
    public ?int $provinceId;
    public ?int $municipalityId;
    public ?int $planId;
    public bool $isActive;
    public ?string $subscriptionStartDate;
    public ?string $subscriptionEndDate;
    public ?string $trialEndsAt;
    public ?array $data;
    public string $adminEmail;
    public string $adminPassword;

    public function __construct(
        string $id,
        string $name,
        string $contactEmail,
        ?string $phone = null,
        ?string $address = null,
        ?int $provinceId = null,
        ?int $municipalityId = null,
        ?int $planId = null,
        bool $isActive = true,
        ?string $subscriptionStartDate = null,
        ?string $subscriptionEndDate = null,
        ?string $trialEndsAt = null,
        ?array $data = null,
        string $adminEmail,
        string $adminPassword
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->contactEmail = $contactEmail;
        $this->phone = $phone;
        $this->address = $address;
        $this->provinceId = $provinceId;
        $this->municipalityId = $municipalityId;
        $this->planId = $planId;
        $this->isActive = $isActive;
        $this->subscriptionStartDate = $subscriptionStartDate;
        $this->subscriptionEndDate = $subscriptionEndDate;
        $this->trialEndsAt = $trialEndsAt;
        $this->data = $data;
        $this->adminEmail = $adminEmail;
        $this->adminPassword = $adminPassword;
    }

    public static function fromRequest(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['contact_email'],
            $data['phone'] ?? null,
            $data['address'] ?? null,
            $data['province_id'] ?? null,
            $data['municipality_id'] ?? null,
            $data['plan_id'] ?? null,
            $data['is_active'] ?? true,
            $data['subscription_start_date'] ?? null,
            $data['subscription_end_date'] ?? null,
            $data['trial_ends_at'] ?? null,
            $data['data'] ?? null,
            $data['admin_email'],
            $data['admin_password']
        );
    }
}
