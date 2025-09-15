Singer Building WordPress Theme
A custom WordPress child theme based on Twenty Twenty-Four, built for Singer Building construction company.
🚀 Quick Start
Requirements

WordPress 6.0+
PHP 8.0+
Twenty Twenty-Four parent theme
Advanced Custom Fields (ACF) plugin (free version)

Installation

Install Parent Theme

bash   # Download and install Twenty Twenty-Four theme
   wp theme install twentytwentyfour --activate

Install Child Theme

bash   # Upload the singer-building-child folder to wp-content/themes/
   wp theme activate singer-building-child

Install Required Plugins

bash   # Install ACF
   wp plugin install advanced-custom-fields --activate

Set Up Home Page

Create a new page called "Home"
Set page template to "Home Template"
Go to Settings > Reading and set "Home" as your static front page
