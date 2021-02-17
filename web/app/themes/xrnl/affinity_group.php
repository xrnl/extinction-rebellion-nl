<?php
/**
 * Template name: Affinity group
 */

function query_all($endpoint)
{
    $API_URL = 'https://actionnetwork.org/api/v2/';
    $actionnetwork_api_key = get_field('actionnetwork_api_key', 'option');
    $responses = [];
    $url = $API_URL . $endpoint;

    $hasElement = true;
    while ($hasElement) {
        // echo('Querying ' . $url);
        $response = wp_remote_get($url, [
            'headers' => [
                'OSDI-API-Token' => $actionnetwork_api_key
            ]
        ]);

        $res = json_decode($response['body'], true);

        $content = $res['_embedded'];

        $responses = array_merge($responses, ...array_values($content));

        $url = $res['_links']['next']['href'];

        if (!isset($url)) {//when no content anymore => stop
            $hasElement = false;
        }
    }
    return $responses;
}

function query($url)
{
    $actionnetwork_api_key = get_field('actionnetwork_api_key', 'option');
    // echo('Querying ' . $url);
    $response = wp_remote_get($url, [
    'headers' => [
        'OSDI-API-Token' => $actionnetwork_api_key
    ]
]);

    return json_decode($response['body'], true);
}


function get_affinity_group()
{
    $res = get_transient('ags');


    // Hardcoded AN endpoints AG forms creation/update forms.
    $an_ag_endpoints = [
  'forms/e8ac2f14-ba65-47fc-9560-90bd17f105fc/submissions'//,
  // 'forms/d38377d0-be06-4853-ae82-06d0425e4918/submissions',
  // 'forms/dac52069-261e-4485-8124-8e075dc84890/submissions',
  // 'forms/8db3db83-38b1-4b9b-8251-6ef672f5cfaa/submissions'
];

    $people_endpoints = array();
    foreach ($an_ag_endpoints as $endpoint) {
        $all = query_all($endpoint);
        foreach ($all as $response) {
            // print_r($response);
            $people = $response['_links']['osdi:person']['href'];
            array_push($people_endpoints, $people);
            // print_r($people_endpoints);
        }
    }


    $ags = array();
    foreach ($people_endpoints as $url) { //TODO remove duplicated
        $response = query($url);
        $ag = array();

        $fields = array("AG_name", "AG_size", "AG_n_non_arrestables", "AG_n_arrestables", "Municipality", "phone_number", "AG_regen_phone", "AG_comment");
        $customFields = $response["custom_fields"];
        foreach ($fields as $field) {
            if (!array_key_exists($field, $customFields)) {
                $customFields[$field] = "";
            }
            $ag[$field] = $customFields[strval($field)];
        }
        if (!array_key_exists("given_name", $response)) {
            $response["given_name"] = "";
        }
        $ag["given_name"] = $response["given_name"];
        array_push($ags, $ag);
    }
    $res = json_encode($ags, JSON_PRETTY_PRINT);

    set_transient('ags', $res, 10);

    return $res;
}

echo(get_affinity_group());


