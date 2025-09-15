
# Singer Building WordPress Theme

A custom WordPress child theme based on Twenty Twenty-Four, built for Singer Building construction company.


## Demo

http://singer-building.local/


## Requirements

- WordPress 6.0+
- PHP 8.0+
- Twenty Twenty-Four parent theme
- Advanced Custom Fields (ACF) plugin (free version)


## Installation

Install Parent Theme
- Download and install Twenty Twenty-Four theme

```bash
   wp theme install twentytwentyfour --activate
```
Install Child Theme
- Upload the singer-building-child folder to wp-content/themes/

```bash
   wp theme activate singer-building-child
```

Install ACF

```bash
   wp plugin install advanced-custom-fields --activate
```

Set Up Home Page

- Create a new page called "Home"
- Set page template to "Home Template"
- Go to Settings > Reading and set "Home" as your static front page
## Development

Local Development Setup

```bash
   # Clone the repository
   git clone https://github.com/yourusername/singer-building-wp-theme.git

   # Navigate to WordPress themes directory
   cd wp-content/themes/

   # Activate the theme
   wp theme activate singer-building-child
```
