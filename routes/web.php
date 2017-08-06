<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chart/revenue1', function() {
    return [
        'chart' => [
            "caption" => "Comparison of Quarterly Revenue",
            "xAxisname" => "Quarter",
            "yAxisName" => "Revenues (In USD)",
            "numberPrefix" => "$",
            "plotFillAlpha" => "80",
            "paletteColors" => "#0075c2,#1aaf5d",
            "baseFontColor" => "#333333",
            "baseFont" => "Helvetica Neue,Arial",
            "captionFontSize" => "14",
            "subcaptionFontSize" => "14",
            "subcaptionFontBold" => "0",
            "showBorder" => "0",
            "bgColor" => "#ffffff",
            "showShadow" => "0",
            "canvasBgColor" => "#ffffff",
            "canvasBorderAlpha" => "0",
            "divlineAlpha" => "100",
            "divlineColor" => "#999999",
            "divlineThickness" => "1",
            "divLineIsDashed" => "1",
            "divLineDashLen" => "1",
            "divLineGapLen" => "1",
            "usePlotGradientColor" => "0",
            "showplotborder" => "0",
            "valueFontColor" => "#ffffff",
            "placeValuesInside" => "1",
            "showHoverEffect" => "1",
            "rotateValues" => "1",
            "showXAxisLine" => "1",
            "xAxisLineThickness" => "1",
            "xAxisLineColor" => "#999999",
            "showAlternateHGridColor" => "0",
            "legendBgAlpha" => "0",
            "legendBorderAlpha" => "0",
            "legendShadow" => "0",
            "legendItemFontSize" => "10",
            "legendItemFontColor" => "#666666"
        ],
        'categories' => [
             ["category" => [
                [
                    "label" => "Q1"
                ],
                [
                    "label" => "Q2"
                ],
                [
                    "label" => "Q3"
                ],
                [
                    "label" => "Q4"
                ]
            ]]
        ],
        'dataset' => [
             [
                 "seriesname" => "Previous Year",
                 "data" => [
                     ["value" => "10000"],
                     ["value" => "11500"],
                     ["value" => "12500"],
                     ["value" => "15000"]
                ]
             ],
             [
                 "seriesname" => "Current Year",
                 "data" => [
                     ["value" => "20000"],
                     ["value" => "21500"],
                     ["value" => "22500"],
                     ["value" => "25000"]
                ]
             ]
        ],
        'trendlines' => [],
    ];

});

Route::get('/chart/stocks', function() {

    return [
        "chart" => [
            "caption" => "Real-time stock price monitor",
            "subCaption" => "Harry's SuperMart",
            "xAxisName" => "Time",
            "yAxisName" => "Stock Price",
            "numberPrefix" => "$",
            "refreshinterval" => "5",
            "yaxisminvalue" => "35",
            "yaxismaxvalue" => "36",
            "numdisplaysets" => "10",
            "labeldisplay" => "rotate",
            "showValues" => "0",
            "showRealTimeValue" => "0",
            "theme" => "zune"
        ],
        "categories" => [
            [
                "category" => [
                    "label" => date("H:i:s")
                ]
            ]
        ],
        "dataset" => [
            "data" => [
                [
                    "value" => rand(35, 40)
                ]
            ]
        ]
    ];
});