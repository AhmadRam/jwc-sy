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
    public function serviceDetails($service = 'administrative')
    {
        $service = strtolower(trim($service));
        $targetItem = null;

        // Map sub-service IDs directly
        if (str_starts_with($service, 'admin-')) {
            $pillar = 'administrative';
            $targetItem = $service;
        } elseif (str_starts_with($service, 'media-')) {
            $pillar = 'media';
            $targetItem = $service;
        } elseif (str_starts_with($service, 'finance-')) {
            $pillar = 'financial';
            $targetItem = $service;
        } else {
            switch ($service) {
                case 'media':
                case 'media-consulting':
                case 'media-pr':
                case 'pillar-2':
                case '2':
                case 'strategic_communication':
                case 'communication_strategies':
                case 'public_relations':
                case 'reputation_management':
                case 'personal_reputation':
                case 'strategic_design':
                case 'cultural_localization':
                case 'advocacy':
                case 'image_building':
                    $pillar = 'media';
                    break;

                case 'financial':
                case 'financial-consulting':
                case 'finance':
                case 'pillar-3':
                case '3':
                    $pillar = 'financial';
                    break;

                case 'administrative':
                case 'administrative-consulting':
                case 'admin':
                case 'pillar-1':
                case '1':
                default:
                    $pillar = 'administrative';
                    break;
            }
        }

        $pillarsConfig = [
            'administrative' => [
                'title' => __('app.pillar_1_title'),
                'desc' => __('app.pillar_1_desc'),
                'services' => __('app.pillar_1_services'),
                'slug' => 'administrative',
                'number' => '01'
            ],
            'media' => [
                'title' => __('app.pillar_2_title'),
                'desc' => __('app.pillar_2_desc'),
                'services' => __('app.pillar_2_services'),
                'slug' => 'media',
                'number' => '02'
            ],
            'financial' => [
                'title' => __('app.pillar_3_title'),
                'desc' => __('app.pillar_3_desc'),
                'services' => __('app.pillar_3_services'),
                'slug' => 'financial',
                'number' => '03'
            ],
        ];

        $currentPillar = $pillarsConfig[$pillar] ?? $pillarsConfig['administrative'];

        return view('service-details', compact('service', 'pillar', 'targetItem', 'currentPillar', 'pillarsConfig'));
    }

}
