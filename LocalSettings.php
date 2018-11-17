<?php

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

wfLoadExtensions([ 'ConfirmEdit', 'ConfirmEdit/ReCaptchaNoCaptcha' ]);
$wgCaptchaClass = 'ReCaptchaNoCaptcha';
$wgReCaptchaSiteKey = '';
$wgReCaptchaSecretKey = '';
$wgReCaptchaSendRemoteIP = 'false';
$wgRateLimits['badcaptcha']['newbie'] = array( 100, 86400 );
$wgRateLimits['edit']['newbie'] = array( 4, 60 );

$wgSMTP = array(
 'host'     => "smtp.gmail.com",
 'IDHost'   => "openrsc.com",
 'port'     => 587,
 'auth'     => true, // Should we use SMTP authentication (true or false)
 'username' => "openrsc.emailer@gmail.com",
 'password' => ""
);

$wgSitename = "Open RSC Wiki";
$wgMetaNamespace = "Open_RSC_Wiki";
$wgScriptPath = "/wiki";
$wgServer = "http://localhost";

$wgResourceBasePath = $wgScriptPath;

$wgLogo = "$wgResourceBasePath/images/thumb/c/c9/Logo.png/120px-Logo.png";

## UPO means: this is also a user preference option
$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "openrsc.emailer@gmail.com";
$wgPasswordSender = "openrsc.emailer@gmail.com";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "mysql"; #for everyday use in Docker containers
#$wgDBserver = "127.0.0.1"; #for import jobs over terminal only
$wgDBserver = "mysql";
$wgDBname = "openrsc_wiki";
$wgDBuser = "root";
$wgDBpassword = "root";

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = [];
$wgEnableUploads = true;
# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;
$wgPingback = false;
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
$wgCacheDirectory = "$IP/cache";

$wgLanguageCode = "en";
$wgSecretKey = "0e7757df33e87f81f51a7a745ddb28a0563f4d9de5ca30ad97f9e97df7c9cbb4";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "84aac39173d3d82e";

$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "https://www.gnu.org/copyleft/fdl.html";
$wgRightsText = "GNU Free Documentation License 1.3 or later";
$wgRightsIcon = "$wgResourceBasePath/resources/assets/licenses/gnu-fdl.png";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['edit'] = false;

$wgDefaultSkin = "tweeki";
wfLoadSkin( 'Tweeki' );
$wgHiddenPrefs[] = 'skin';

wfLoadExtension( 'CodeEditor' );
wfLoadExtension( 'ConfirmEdit' );
wfLoadExtension( 'SpamBlacklist' );
wfLoadExtension( 'TitleBlacklist' );
wfLoadExtension( 'WikiEditor' );
