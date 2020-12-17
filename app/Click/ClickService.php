<?php


namespace App\Click;


use App\Click\Repositories\BadDomainRepositoryInterface;
use App\Click\Repositories\ClickRepositoryInterface;

class ClickService implements ClickServiceInterface
{
    protected $badDomainRepository;
    protected $clickRepository;

    public function __construct(BadDomainRepositoryInterface $bd, ClickRepositoryInterface $c)
    {
        $this->badDomainRepository = $bd;
        $this->clickRepository = $c;
    }

    public function trackClick(array $data) : string
    {
        $click = $this->clickRepository->create($data);
        return $click->id;
    }
}
