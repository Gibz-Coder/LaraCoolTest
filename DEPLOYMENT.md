# Coolify Deployment Guide

## Environment Variables Required for Production

When deploying to Coolify, ensure the following environment variables are set:

### Essential Variables
```
APP_NAME=LaraCoolTest
APP_ENV=production
APP_KEY=base64:your-generated-key-here
APP_DEBUG=false
APP_URL=https://your-actual-domain.com
```

### Database Configuration
```
DB_CONNECTION=sqlite
# Or for MySQL/PostgreSQL:
# DB_CONNECTION=mysql
# DB_HOST=your-db-host
# DB_PORT=3306
# DB_DATABASE=your-database
# DB_USERNAME=your-username
# DB_PASSWORD=your-password
```

### Logging (Production Settings)
```
LOG_CHANNEL=stack
LOG_STACK=single
LOG_LEVEL=error
```

## Build Configuration

The application has been configured to work with Node.js 18 (used by Coolify):
- Laravel Vite Plugin: v1.0.5 (compatible with Node.js 18)
- Vite: v5.4.8 (compatible with Node.js 18)
- Bootstrap imports use correct distribution paths

## Deployment Process

1. **Environment Setup**: Configure the environment variables in Coolify
2. **Build Process**: Coolify will automatically run `npm ci` and `npm run build`
3. **Asset Generation**: Vite will generate optimized assets in `public/build/`
4. **Application Start**: Laravel will serve the application with built assets

## Troubleshooting

### Build Failures
- Ensure Node.js 18 compatibility by using the package versions specified in package.json
- Verify Bootstrap import paths are correct in resources/css/app.css
- Check that all environment variables are properly set

### Asset Loading Issues
- Verify APP_URL matches your actual domain
- Ensure Vite manifest is generated correctly during build
- Check that public/build directory contains all necessary assets

## Key Files Modified for Deployment

- `package.json`: Updated with Node.js 18 compatible package versions
- `vite.config.js`: Optimized for production builds
- `resources/css/app.css`: Correct Bootstrap import paths
- `.env.example`: Production-ready environment configuration