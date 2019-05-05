=== BrainCert - HTML5 Virtual Classroom ===
Contributors: BrainCert
Tags: braincert, virtual classroom, html5, webrtc, whiteboard, screen sharing, video conference, audio conference, chat, annotate, wolfram alpha, latex, conference, meeting, webinar, live class, share screen, video player, line tools, blended learning, video chat
Requires at least: 4.5
Tested up to: 4.9
Stable tag: 1.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WebRTC powered HTML5 Virtual Classroom to deliver live classes and webinars.


== Description ==
BrainCert's next-generation [HTML5 Virtual Classroom](https://www.braincert.com/online-virtual-classroom) is designed for seamless synchronous and asynchronous collaboration capabilities between presenter (teacher) and attendees (students). BrainCert offers over 14 low-latency datacenter locations worldwide - the largest secure global infrastructure, enabling you to schedule and launch live virtual classroom sessions no matter where you or your attendees may be! 

To use this application, sign up for your free [BrainCert](https://www.braincert.com) account  and register your [API key](https://www.braincert.com/app/virtualclassroom). 

See [Developer documentation](https://www.braincert.com/docs/api/vc/) for more info. BrainCert provides a RESTful interface to the resources in the Virtual Classroom e.g. classes, video recordings, shopping cart, etc.


== HTML5 Virtual Classroom features: ==
* WebRTC based Ultra HD audio and video conferencing with great resiliency and multiple full HD participants.
* Support for WebRTC in macOS and iOS devices using Safari 11 browser. Android support using Opera and Chrome browser. Desktop support using Chrome and Firefox browsers.
* Available in 50 languages. Use API calls to force an interface language or allow attendees to select a language.
* Cloud-based session recording without the need to install any other software or browser plugins. Download recorded lessons as 720p HD file, share and play online for attendees. 
* Record classes manually or automatically and download multiple recordings in a session or combine all in to one file - all using a simple API call.
* Group HTML5-based HD Screen Sharing in tabbed interface. Enhance your computer-based training classes by sharing entire screen or just a single application. No software downloads or installations necessary.
* Multiple interactive whiteboards. The staple of all classroom instruction is the whiteboard that supports drawing tool, LaTEX math equations, draw shapes & symbols, line tools, save snapshots, and share documents in multiple tabs.
* Share documents & presentations. Stream Audio/Video files securely.
* Wolfram|Alpha gives you access to the world's facts and data and calculates answers across a range of topics, including science, engineering, mathematics.
* Equations editor, group chat, and powerful annotation feature to draw over uploaded documents & presentations. 
* Responsive whiteboard fits any screen and browser resolution for seamless same viewing experience by all attendees.


== About BrainCert ==
BrainCert (https://www.braincert.com) is a cloud-based all-in-one educational platform that comes integrated with 4 core platforms in one unified solution - courses platform, online testing platform, award-winning virtual classroom, and content management system. The result - significant cost savings, increasing productivity, and secure, seamless and enhanced user experience across all platforms.


== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the Settings->Plugin Name screen to configure the plugin
1. If you want to show front end live classes in a page, use short code `[class_list_front]` in your page.

[Download](https://www.braincert.com/braincert-support/downloads/category/wordpress) plugin documentation.


== Frequently Asked Questions ==

= Where is the plugin documentation? = 
[Download](https://www.braincert.com/braincert-support/downloads/category/wordpress) plugin documentation.

= Do you offer free trial? = 
The free plan supports 2 connections (1 instructor + 1 attendee) with a maximum duration of 30 minutes per session. It supports 600 minutes of Free API usage. [Upgrade](https://www.braincert.org/membership/premium) your API account to use more attendees in a live session, and session duration. All paid API plans comes with premium features such as more attendees in a live class, session recording feature with HD video encoding, etc.,

= What about branding and white-label solution? = 
So glad you asked! With Virtual Classroom API, you can upload your own logo, set colors & theme, change API endpoint to your own domain, and even map SSL certificate.
1. [How to map your external domain with API endpoint](https://www.braincert.com/braincert-support/kb/article/how-to-map-your-external-domain-with-api-endpoint)
1. [Setting up SSL encrypted traffic (HTTPS)](https://www.braincert.com/braincert-support/kb/article/setting-up-ssl-encrypted-traffic-https-using-cloudflare-for-html5-virtual-classroom-20160729170543)

= Helpful links = 
1. [Virtual Classroom knowledge base](https://www.braincert.com/braincert-support/kb/live)
1. [Developer guide](https://www.braincert.com/docs/api/vc/)
1. [Documentation](https://www.braincert.com/braincert-support/downloads/category/wordpress)
1. [FAQ](https://www.braincert.com/docs/api/vc/faq.php)

= Can I use my own shopping cart to sell live classes? =
Most certainly. You can use the API to schedule and launch classes, and use your own shopping cart system to collect payments.


= What about security? =
Data security is of utmost importance to us - all our traffic is done over SSL, the web standard for secure data transmission, and files are stored with top-grade secured infrastructure.

== Screenshots ==
1. HTML5 Virtual Classroom
2. Features Overview
3. Low-latency Datacenter Locations Worldwide
4. API Dashboard


== Upgrade Notice ==

= 1.7 =
* Introduced option to enable or disable private chat feature
* New feature to assign specific teacher to a class when scheduling a class
* New feature to allow teachers to schedule and launch classes from frontend without the need to login to backend using short code [class_schedule_teacher] on a page.
* Optimized code and fixed few other minor issues

= 1.6 =
* Replaced HighCharts with a new chart system for attendance reports
* Fixed PayPal related error such as "The amount is invalid" during checkout
* Fixed incorrect countdown timer for upcoming classes
* Optimized code and fixed few other minor issues

= 1.5 =
* Removed twitter bootstrap to have plugin work with its own native CSS file to avoid breaking WP templates.
* Support for WebRTC in macOS and iOS devices using Safari 11 browser. 
* Introduced support for all new API calls such as auto recording and multiple/single recorded videos
* Introduced options menu with several new features for classes to manage classes easily
* Added support to invite user or group to a class
* Introduced HTML5 video player to view and manage class recordings
* Published class recordings from the backend will now appear in the frontend class details page and all enrolled students to the class can view the recorded videos.
* New class details page with permanent link to the class that can be shared by email or in social media.
* Fix issues with scheduling recurring classes
* Addthis social sharing support in class details page to allow attendees to share the class easily.
* Integrated 'Class Attendance Report' that shows you wide variety of useful data such as duration, time in/out, and attendance report about your attendees along with an interactive graphical layout that can be exported.
* New class landing page design with an aesthetically pleasing responsive countdown timer that lets meeting participants know exactly how much time remains before the live class will begin.
* Use [student_invite]short code in a page to invite students to a class
* Use [class_list_front] short code in a page to list all classes
* Use [class_details id=classId] to list specific class to a page. For example, [class_details id=383922]
* Assign classes to a group. Requires groups plugin https://wordpress.org/plugins/groups/ installed.
* Fixed several minor issues.


== Changelog ==

= 1.5 =
* Removed twitter bootstrap to have plugin work with its own native CSS file to avoid breaking WP templates.
* Support for WebRTC in macOS and iOS devices using Safari 11 browser. 
* Introduced support for all new API calls such as auto recording and multiple/single recorded videos
* Introduced options menu with several new features for classes to manage classes easily
* Added support to invite user or group to a class
* Introduced HTML5 video player to view and manage class recordings
* Published class recordings from the backend will now appear in the frontend class details page and all enrolled students to the class can view the recorded videos.
* New class details page with permanent link to the class that can be shared by email or in social media.
* Fix issues with scheduling recurring classes
* Addthis social sharing support in class details page to allow attendees to share the class easily.
* Integrated 'Class Attendance Report' that shows you wide variety of useful data such as duration, time in/out, and attendance report about your attendees along with an interactive graphical layout that can be exported.
* New class landing page design with an aesthetically pleasing responsive countdown timer that lets meeting participants know exactly how much time remains before the live class will begin.
* Use [student_invite]short code in a page to invite students to a class
* Use [class_list_front] short code in a page to list all classes
* Use [class_details id=classId] to list specific class to a page. For example, [class_details id=383922]
* Assign classes to a group. Requires groups plugin https://wordpress.org/plugins/groups/ installed.
* Fixed several minor issues.

= 1.4 =
* Changed plugin as per WordPress policy updates addressing security issues and general guidelines.

= 1.3 =
* Optimized code and minor security fixes.

= 1.2 =
* Fixed several minor issues.
* Support for external domain and SSL certificate mapping.
* Improved backend query for timezone conversion and loading time.
* Removed restriction for PM/AM classes that previously was giving error message "Classes cannot continue to next day".
* Added support for both HTML5 Virtual Classroom (https://api.braincert.com/v2) and Flash version (https://api.braincert.com/v1).
* Added support for global datacenter server selection using isRegion API call.
* Added support for auto record sessions using isRecord=2 API call.
* Added support to load only whiteboard or entire app with audio/video, and group chat using isBoard API call.
* Added search filters in component for classes, pricing schemes, discounts, etc.,

= 1.1 =
* Fixed Virtual Classroom launch issues with the latest WordPress releases.

= 1.0 =
* Initial Release.