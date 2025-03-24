<?php

namespace Modules\PkgWidget\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\PkgWidget\App\Services\WidgetService;

class WidgetController extends Controller
{
    protected $widgetService;

    public function __construct(WidgetService $widgetService)
    {
        $this->widgetService = $widgetService;
    }

    /**
     * Show the test form.
     */
    public function test()
    {
        return view('PkgWidget::test');
    }

    /**
     * Execute the method provided in the form using the service.
     */
    public function execute(Request $request)
    {
        $methodName = $request->input('method_name');

        // The service handles the try/catch internally.
        $data = $this->widgetService->dynamicCall($methodName);

        // Render the dashboard view with the returned data.
        return view('PkgWidget::dashboard', $data);
    }
}
