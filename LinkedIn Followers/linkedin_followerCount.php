<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Replace YOUR_ACCESS_TOKEN with your actual LinkedIn API access token
$accessToken = 'YOUR_ACCESS_TOKEN';

// Replace YOUR_ORGANIZATION_URN with the unique identifier (URN) for the organization you want to retrieve the follower count for
$organizationUrn = 'urn:li:organization:YOUR_ORGANIZATION_URN';

// LinkedIn API endpoint URL
$apiUrl = 'https://api.linkedin.com/rest/networkSizes/' . $organizationUrn . '?edgeType=COMPANY_FOLLOWED_BY_MEMBER';

// Initialize cURL session
$ch = curl_init($apiUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $accessToken,
    'Linkedin-Version: 202305' // Replace with the desired LinkedIn API version (e.g., 202305)
]);

// Execute the API call
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Process the API response
if ($response) {
    $responseData = json_decode($response, true);

    if (isset($responseData['firstDegreeSize'])) {
        $followerCount = $responseData['firstDegreeSize'];
echo json_encode(["number"=> $followerCount]);
    } else {
        echo "Unable to retrieve follower count.";
    }
} else {
    echo "API request failed.";
}
?>

