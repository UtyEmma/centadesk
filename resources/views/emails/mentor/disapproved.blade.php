<x-email.index>
    <x-email.header />

    <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
      <center>
        <table cellspacing="0" cellpadding="0" width="600" class="w320">
          <tr>
            <td class="header-lg">
                {{$subject}}
            </td>
          </tr>
          <tr>
            <td class="free-text">
              <span><a href="">@JaneDoe</a></span> has invited you to join Awesome inc!
            </td>
          </tr>
          <tr>
            <td class="mini-block-container">
              <table cellspacing="0" cellpadding="0" width="100%"  style="border-collapse:separate !important;">
                <tr>
                  <td class="mini-block">
                    <table cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td>
                          <table cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                              <td class="user-img">
                                <a href=""><img class="user-img" src="http://s3.amazonaws.com/swu-filepicker/Ei7o4zRgT561k4rLfzTz_profile_pic.jpg" alt="user img" /></a>
                                <br /><a href="">@JaneDoe</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="user-msg">
                                "Hey Bob,
                                here's your invite! Come check out my profile page when you have a chance. You'll love it!"
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td class="button">
                          <div><!--[if mso]>
                            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:45px;v-text-anchor:middle;width:155px;" arcsize="15%" strokecolor="#ffffff" fillcolor="#ff6f6f">
                              <w:anchorlock/>
                              <center style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">Sign Up</center>
                            </v:roundrect>
                          <![endif]--><a href="{{$dashboard}}" style="background-color:#ff6f6f;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">Go to my Mentor Dashboard</a></div>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </center>
    </td>

    <x-email.footer />
</x-email.index>
