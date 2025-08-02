# LaraCoolTest 🚀

A modern, responsive Laravel landing page showcasing clean design, best practices, and powerful functionality. Built with Laravel 11 and Bootstrap 5.

![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple.svg)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)
![License](https://img.shields.io/badge/License-MIT-green.svg)

## ✨ Features

- **Modern Design**: Clean, contemporary design that looks great on all devices
- **Laravel Powered**: Built with the latest Laravel 11 framework for reliability and performance
- **Responsive Layout**: Fully responsive design that works perfectly on mobile, tablet, and desktop
- **Easy to Customize**: Well-structured code that makes customization and extension simple
- **SEO Optimized**: Proper meta tags, semantic HTML, and performance optimizations
- **Accessibility**: WCAG compliant with proper ARIA labels and keyboard navigation
- **Contact Form**: Functional contact form with validation and error handling
- **Smooth Animations**: CSS animations and scroll effects for enhanced user experience

## 🛠️ Technologies Used

- **Backend**: Laravel 11.x
- **Frontend**: Bootstrap 5.3, HTML5, CSS3, JavaScript (ES6+)
- **Icons**: Font Awesome 6
- **Build Tool**: Vite
- **Database**: SQLite (default) / MySQL
- **PHP Version**: 8.2+

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js >= 18.x
- NPM or Yarn

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/LaraCoolTest.git
cd LaraCoolTest
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node.js Dependencies

```bash
npm install
```

### 4. Environment Setup

```bash
# Copy the environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 5. Database Setup

```bash
# Create database (SQLite is used by default)
touch database/database.sqlite

# Run migrations (if any are added in the future)
php artisan migrate
```

### 6. Build Assets

```bash
# For development
npm run dev

# For production
npm run build
```

### 7. Start the Development Server

```bash
php artisan serve
```

Visit `http://localhost:8000` to view the application.

## 📁 Project Structure

```
LaraCoolTest/
├── app/
│   └── Http/
│       ├── Controllers/
│       │   └── LandingController.php
│       └── Requests/
│           └── ContactFormRequest.php
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php
│   │   ├── components/
│   │   │   ├── header.blade.php
│   │   │   ├── hero.blade.php
│   │   │   ├── features.blade.php
│   │   │   ├── about.blade.php
│   │   │   ├── contact.blade.php
│   │   │   └── footer.blade.php
│   │   └── landing.blade.php
│   ├── css/
│   │   └── app.css
│   └── js/
│       └── app.js
├── routes/
│   └── web.php
└── public/
    └── [compiled assets]
```

## 🎨 Customization

### Colors

The application uses CSS custom properties for easy color customization. Edit the `:root` section in `resources/css/app.css`:

```css
:root {
    --primary-color: #3B82F6;
    --secondary-color: #10B981;
    --text-dark: #1F2937;
    --text-light: #6B7280;
    /* ... other colors */
}
```

### Content

- **Hero Section**: Edit the data passed from `LandingController@index`
- **Features**: Modify the `$features` array in the controller
- **About Section**: Update the content in `components/about.blade.php`
- **Contact Information**: Edit the contact details in `components/contact.blade.php` and `components/footer.blade.php`

### Styling

- **Global Styles**: `resources/css/app.css`
- **Component Styles**: Each component has its own `@push('styles')` section
- **Responsive Breakpoints**: Bootstrap 5 breakpoints are used throughout

## 📧 Contact Form

The contact form includes:

- **Validation**: Server-side validation with custom error messages
- **CSRF Protection**: Laravel's built-in CSRF protection
- **Error Handling**: User-friendly error display
- **Success Messages**: Confirmation messages after submission

To extend the contact form functionality:

1. Create a database migration for storing contacts
2. Create a Contact model
3. Update the `LandingController@contact` method to save to database
4. Add email notifications using Laravel's Mail system

## 🔧 Development

### Running in Development Mode

```bash
# Start the Laravel development server
php artisan serve

# In another terminal, start Vite for asset compilation
npm run dev
```

### Building for Production

```bash
# Build optimized assets
npm run build

# Clear and cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 🧪 Testing

```bash
# Run PHP tests
php artisan test

# Run specific test
php artisan test --filter=LandingPageTest
```

## 📱 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## 🚀 Deployment

### Using Laravel Forge

1. Connect your repository to Laravel Forge
2. Set up your server and site
3. Configure environment variables
4. Deploy!

### Manual Deployment

1. Upload files to your server
2. Run `composer install --optimize-autoloader --no-dev`
3. Run `npm run build`
4. Set proper file permissions
5. Configure your web server

### Environment Variables

Key environment variables to set in production:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## 🙏 Acknowledgments

- [Laravel](https://laravel.com/) - The PHP framework for web artisans
- [Bootstrap](https://getbootstrap.com/) - The world's most popular CSS framework
- [Font Awesome](https://fontawesome.com/) - The web's most popular icon set

## 📞 Support

If you have any questions or need help with setup, please:

1. Check the [Issues](https://github.com/yourusername/LaraCoolTest/issues) page
2. Create a new issue if your problem isn't already addressed
3. Contact us at hello@laracooltest.com

---

Made with ❤️ using Laravel and Bootstrap