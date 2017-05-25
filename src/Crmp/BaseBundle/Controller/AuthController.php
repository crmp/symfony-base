<?php


namespace Crmp\BaseBundle\Controller;

use Crmp\BaseBundle\Repository\AddressRepository;

/**
 * AuthController
 *
 * @package Crmp\BaseBundle\Controller
 */
class AuthController extends AbstractCrmpController
{
    /**
     * @var AddressRepository
     */
    private $addressRepository;

    /**
     * Auth controller with repositories.
     *
     * @param AddressRepository $addressRepository
     */
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

    /**
     * Handle login requests.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction()
    {
        return $this->handleView($this->view()->setTemplate('@CrmpBase/Auth/login.html.twig'));
    }
}
