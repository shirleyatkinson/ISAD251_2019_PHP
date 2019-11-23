<?php

include_once '../src/model/request.php';

function alert($request)
{
    try
    {
    //SMB109URI
    //$URI = = "http://192.168.0.50/api/stlaB2I6VZ8O80Qepc-1xfmLrHgyTFvB9IGupaQz/lights";
    //Tester URI
     $URI = "http://192.168.1.81/api/newdeveloper/lights/";

    //colours are Red 0 or 65535, Orange = 10?, yellow = 12750, Green = 25500, Blue = 46920
    $lightsArray = array(0, 5000, 12750, 25500, 46920);

    //Get the row ID plus the seat ID to map to the lights
    $URI .= $request->Row()."/state";
    $seatNumber = (int)$request->Seat()-1;

    $content = array("on"=>true, "hue"=>$lightsArray[$seatNumber]);

    $jsonData = json_encode($content);

    //Initialise the CURL library
    $httpClient = curl_init($URI);
     //Set the HTTP verb
        curl_setopt($httpClient, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($httpClient, CURLOPT_RETURNTRANSFER, true);

    //Tell it the content type - or the webservice does not know what to do with it
    curl_setopt($httpClient, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)));

     //Now give it the data to post in
    curl_setopt($httpClient, CURLOPT_POSTFIELDS, $jsonData);

    $response = curl_exec($httpClient);

    //The HTTP code is important to be able to handle any errors and responses.
    $httpCode = curl_getinfo($httpClient, CURLINFO_HTTP_CODE);
    curl_close($httpClient);
}
    catch(Exception $e)
    {
        echo $e->message();
    }
}