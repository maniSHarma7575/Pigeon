<?php
function dnd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}
function controllersStrings()
{
    return array('Home','ForgotPassword','User','Verification','Campaign','Dashboard','Subscriber','Category');
}
function sanitize($dirty)
{
    return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
}
function currentUser()
{
    return Users::currentLoggedInUser();
}
function postedValues($post)
{
    $post_array = [];
    foreach ($post as $key => $value) {
        $post_array[$key] = $value;
    }
    return $post_array;
}
function token()
{
    $token = 'qwertyuiopasdfghjklQWERTYUIOPASDFGHJKLZXCVBNM1234567890@$%!*';
    $token = str_shuffle($token);
    $token = substr($token, 0, 10);
    return $token;
}
function documentValidation($size_of_uploaded_file, $max_allowed_file_size, $allowed_extensions, $type_of_uploaded_file)
{
    $errors = '';
    if ($size_of_uploaded_file > $max_allowed_file_size) {
        $errors .= "\n Size of file should be less than $max_allowed_file_size";
    }


    $allowed_ext = false;
    for ($i = 0; $i < sizeof($allowed_extensions); $i++) {
        if (strcasecmp($allowed_extensions[$i], $type_of_uploaded_file) == 0) {
            $allowed_ext = true;
        }
    }

    if (!$allowed_ext) {
        $errors .= "The uploaded file is not supported file type. " .
            " Only the following file types are supported: " . implode(',', $allowed_extensions);
    }
    return $errors;
}
function emailTemplate()
{
    $template['first'] = '<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
      <td style="padding: 10px 0 10px 0;">
          <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
              <tr>
                  <td align="center" bgcolor="#70bbd9" style="padding: 10px 0 10px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                      <h2 style="color:black; display: block;">';
    $template['second'] = '</h2>
                  </td>
              </tr>
              <tr>
                  <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tr>
                              <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                  <b>';
    $template['third'] = '</b>
                              </td>
                          </tr>
                          <tr>
                              <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">';


    $template['fourth'] = '</td>
                          </tr>

                      </table>
                  </td>
              </tr>
              <tr>
                  <td bgcolor="#70bbd9">
                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tr>
                              <td style="padding-top:10px;text-align:center;color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                                  <div><img src="http://ec2-3-6-171-185.ap-south-1.compute.amazonaws.com/public/dashboard/img/logo.png" width="80" height="80">
                                      <p>Pigeon is a free open source platform to launch your campaigns and grow your business.</p>
                              </td>
                              <td>
                                  <table border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                          <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                              <a href="https://twitter.com/ManishS77291587" style="color: #ffffff;">
                                                  <img src="https://img.icons8.com/ios-glyphs/48/000000/twitter.png " style="width: 25px; height: 25px;"></a>
                                          </td>
                                          <td style="font-size: 0; line-height: 0;" width="20">&nbsp;></td>
                                          <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                              <a href="https://www.facebook.com/profile.php/manishsharma" style="color: #ffffff;">
                                                  <img src="https://img.icons8.com/android/48/000000/facebook-new.png" style="width: 25px; height: 25px;"> </a>
                                          </td>
                                          <td style="font-size: 0; line-height: 0;" width="20">&nbsp;></td>
                                          <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                              <a href="https://www.linkedin.com/in/manish-sharma-694263157" style="color: #ffffff;">
                                                  <img src="https://img.icons8.com/android/48/000000/linkedin.png" style="width: 25px; height: 25px;"> </a>
                                          </td>
                                          <td style="font-size: 0; line-height: 0;" width="20">&nbsp;></td>
                                          <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                              <a href="https://github.com/maniSHarma7575" style="color: #ffffff;">
                                                  <img src="https://img.icons8.com/ios-filled/50/000000/github.png" style="width: 25px; height: 25px;"> </a>
                                          </td>
                                          <td style="font-size: 0; line-height: 0;" width="20">&nbsp;></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                      </table>
                  </td>
              </tr>
          </table>
      </td>
  </tr>
</table>';
    return $template;
}

function categoryList()
{
    $category=new Categories();
    $results=$category->findAll();
    foreach($results as $result)
    {
        $categories[]=$result->name;
    }
    return $categories;
}
