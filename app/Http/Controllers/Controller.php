<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    /**
     * Loads the home page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Loads the packages page.
     *
     * @return \Illuminate\View\View
     */
    public function packages()
    {
        return view('packages');
    }

    /**
     * Loads the starter page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function starter_page()
    {
        return view('starter-page');
    }

    /**
     * Loads the portfolio details page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function portfolio_details()
    {
        return view('portfolio-details');
    }

    /**
     * Loads the English portfolio details page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function portfolio_details_en()
    {
        return view('portfolio-details_en');
    }

    /**
     * Loads the service details page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function service_details()
    {
        return view('service-details');
    }

    /**
     * Loads the English service details page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function service_details_en()
    {
        return view('service-details_en');
    }

    /**
     * Loads the service details page with dynamic content based on service type.
     *
     * @param string $service
     * @return \Illuminate\View\View
     */
    public function serviceDetails($service)
    {
        $locale = app()->getLocale();

        return view('service-details', compact('service'));
    }

}
