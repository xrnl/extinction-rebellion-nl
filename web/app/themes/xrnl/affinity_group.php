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

// function get_affinity_groups()
// {
//     $ags = get_transient('ags');

//     // Hardcoded AN endpoints AG forms creation/update forms.
//     $an_ag_endpoints = [
//     'forms/e8ac2f14-ba65-47fc-9560-90bd17f105fc/submissions'//,
//     // 'forms/d38377d0-be06-4853-ae82-06d0425e4918/submissions',
//     // 'forms/dac52069-261e-4485-8124-8e075dc84890/submissions',
//     // 'forms/8db3db83-38b1-4b9b-8251-6ef672f5cfaa/submissions'
//     ];

//     $people_endpoints = array();
//     foreach ($an_ag_endpoints as $endpoint) {
//         $all = query_all($endpoint);
//         foreach ($all as $response) {
//             // print_r($response);
//             $people = $response['_links']['osdi:person']['href'];
//             array_push($people_endpoints, $people);
//             // print_r($people_endpoints);
//         }
//     }


//     $ags = array();
//     foreach ($people_endpoints as $url) { //TODO remove duplicated
//         $response = query($url);
//         $ag = array();

//         $fields = array("AG_name", "AG_size", "AG_n_non_arrestables", "AG_n_arrestables", "Municipality", "phone_number", "AG_regen_phone", "AG_comment");
//         $customFields = $response["custom_fields"];
//         foreach ($fields as $field) {
//             if (!array_key_exists($field, $customFields)) {
//                 $customFields[$field] = "";
//             }
//             $ag[$field] = $customFields[strval($field)];
//         }
//         if (!array_key_exists("given_name", $response)) {
//             $response["given_name"] = "";
//         }
//         $ag["given_name"] = $response["given_name"];
//         array_push($ags, $ag);
//     }
//     print(json_encode($ags));

//     set_transient('ags', $ags, DAY_IN_SECONDS);

//     return $ags;
// }

//For dev purpose
function get_affinity_groups()
{
// TODO: query affinity groups from AN
}

get_header(); ?>

<main class="affinity-group ">
  <div class="bg-blue px-3 py-lg-5 pb-5 text-center text-white text-uppercase font-xr cover-image"
    style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.45)), url('<?php get_the_post_thumbnail_url(); ?>') no-repeat;">
    <div class="py-5">
      <?php the_content(); ?>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <?php foreach (get_affinity_groups() as $ag) {?>
      <div class="d-flex flex-column col-12 col-sm-6 col-lg-4 col-xl-3 p-2">
        <div class="ag-picture d-flex flex-column flex-1 text-center">
          <span class="mt-auto text-white text-uppercase font-xr"> <?php echo $ag["AG_name"] ?>
          </span>
        </div>
        <div class="d-flex flex-column text-center ag-info">
          4 spot left
        </div>
      </div>
      <?php } ?>
    </div>
  </div>


</main>

<?php get_footer();
