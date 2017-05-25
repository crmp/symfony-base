<?php


namespace Crmp\BaseBundle\Controller;


use Crmp\BaseBundle\Repository\AddressRepository;

class AuthController extends AbstractCrmpController
{
    /**
     * @var AddressRepository
     */
    private $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    /**
     * @return AddressRepository
     */
    public function getAddressRepository()
    {
        return $this->addressRepository;
    }

    public function loginAction()
    {
        return $this->handleView($this->view()->setTemplate('@CrmpBase/Auth/login.html.twig'));
    }
}
