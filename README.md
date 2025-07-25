moodle-local_och5pcore
=====================
The main purpose of this plugin is to make it possible for the teachers to select Opencast Video from within the H5P Editor when using H5P Interactive Videos feature.<br />
It provides an easy way to add support for H5P opencast to your site themes. It does this by writing new code into your theme renderer.php and config.php files, adding the code required to allow your theme to render H5P opencast content (as suggested by H5P.org in <a href="https://h5p.org/moodle-customization">Moodle Customization</a>). Your web server process must also have write access to the Moodle installation tree for this plugin to function.<br />
This design helps to apply the required extension to every installed theme dynamically, instead of creating an extended theme!
Using this integration now enables teachers to select opencast videos in a course, using a dropdown inside the H5P Interactive Videos' editor in course content bank. After selecting the opencast video, another dropdown will be shown to select different types of video flavor (Presenter/Presentation). By selecting the video flavor, all available qualities of the video then will be inserted into H5P Editor videos list and the rest will be processed by H5P.


System requirements
------------------
1. Min. Moodle Version: 3.10: <br />From Moodle 3.10 onwards, the H5P Core has the ability to alter H5P via overriding the renderers and hooks <a href="https://tracker.moodle.org/browse/MDL-69087">MDL-69087</a> to add customized scripts and styles into H5P.
2. Installed plugin:
   - versions (< v3.0-r1):
      - <a href="https://github.com/Opencast-Moodle/moodle-tool_opencast">tool_opencast</a> (Min. version: <a href="https://github.com/Opencast-Moodle/moodle-tool_opencast/releases/tag/v3.11-r3">v3.11-r3</a> & Max. version (v3.11-r8))
      - <a href="https://github.com/Opencast-Moodle/moodle-block_opencast">block_opencast</a> (Min. version: <a href="https://github.com/Opencast-Moodle/moodle-block_opencast/releases/tag/v3.11-r3">v3.11-r3</a> & Max. version (v3.11-r8))
      - IMPORTANT: You should update the tool_opencast first because otherwise the block_opencast installation will fail.
   - versions (> v3.0-r1):
      - <a href="https://github.com/Opencast-Moodle/moodle-tool_opencast">tool_opencast</a> (Min. version: <a href="https://github.com/Opencast-Moodle/moodle-tool_opencast/releases/tag/v4.0-r1">v4.0-r1</a>)
      - <a href="https://github.com/Opencast-Moodle/moodle-block_opencast">block_opencast</a> (Min. version: <a href="https://github.com/Opencast-Moodle/moodle-block_opencast/releases/tag/v4.0-r1">v4.0-r1</a>)

Opencast configuration for multiple nodes setups:
------------------
If you use a constellation of opencast nodes, one for admin and another for presentation (i.e. engage node) it is <b>important</b> that your moodle user account in opentcast has the role that makes the services endpoint available. It is by default (and based on experience) included in the "ROLE_GROUP_MH_DEFAULT_ORG_SYSTEM_ADMINS" role.

**NOTE**: In version **v4.5-r1**, we switched from using the Opencast services endpoint to the API base endpoint to retrieve the Engage node URL. As a result, the role `ROLE_GROUP_MH_DEFAULT_ORG_SYSTEM_ADMINS` **no longer has any effect** for this plugin. Instead, you need to **assign** the role `ROLE_UI_EVENTS_EMBEDDING_CODE_VIEW` to the Opencast API User.

Prerequisites
------------------
* Proper write permission on themes directories for the server user (e.g. "www-data" Apache User)
* In case you are using the unofficial version (tool_och5p_core) v1.0.0, it is recommended to uninstall it.

Features
------------------
* Extend several themes at once via Moodle's multiselect feature by holding the Ctrl key.
* Remove extensions applied to several themes at once via Moodle's multiselect feature by holding the Ctrl key.
* Display Opencast videos of the course inside H5P Interactive Videos Editor.
* Extract and display Opencast video flavors inside H5P Interactive Videos Editor.
* Extract and use different quality of the Opencast video inside H5P Interactive Videos.
* Opencast LTI authentication
* Getting search endpoint (Engage/Presentation node) from Opencast services. ([v2.1 - v3.x])
* The Engage/Presentation node for search endpoint is retrieved from the Opencast API base endpoint. (v4.5-r1)

How it works
------------------
* In the admin setting page, there is the possibility to select multiple available themes to extend.
* Deselecting a theme will remove the extension changes.
* Only videos which are published to opencast engage player, can be displayed and process, because media index of the event must be available.
* LTI credential can be configured if the "Secure Static Files" in opencast setting is enabled.

Important for admins to know:
------------------
* This plugin creates new files within the Moodle core installation.
* By extending a theme, the plugin attempts to add own code into the files of selected themes.

How to revert the changes:
------------------
* Through the admin setting page, deselecting a theme will revert the changes.
* Uninstalling the plugin will also trigger the uninstallation event, by which all changes to the extended themes will be removed!

Revert changes manually:
------------------
It is possible to revert the changes manually, but it is not recommended doing so. However, the plugin only changes the files as follows:
* (rootdir) > themes > {your installed theme dir} > renderers.php
* (rootdir) > themes > {your installed theme dir} > config.php
Changes made by this plugin can be identified as a code block started with a comment containing "// Added by local_och5pcore plugin" and ends with a comment containing "// End of local_och5pcore code block."

Repair the loss of changes on renderers.php:
----------------
In case the changes on renderers.php or even the file itself is gone, the plugin will repeat the changes by itself which can be done simply via admin setting page:

1. Deselect the defected theme, to let the plugin know that the changes should not be there anymore!
2. Save changes.
3. Select the defected theme again, to repeat the changes.
4. Save changes.

Common issues
------------------
* If using LTI authentication with Secure Static Files option in Opencast, and the selected Opencast video is not displayed with error showing "Video format not supported", you might need to try Partitioning the cookies in your Opencast Nginx/Apache server.
