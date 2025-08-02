# Design Document

## Overview

The Coolify deployment failure is caused by two main issues:
1. **Bootstrap Import Path Issue**: The CSS file imports `bootstrap/scss/bootstrap` but the actual installed package provides `bootstrap/dist/css/bootstrap.css`
2. **Node.js Version Compatibility**: The deployment uses Node.js 18, but some packages (laravel-vite-plugin@2.0.0 and vite@7.0.6) require Node.js 20.19.0+ or 22.12.0+

The solution involves fixing the import paths, updating package versions for compatibility, and optimizing the build configuration for Coolify's environment.

## Architecture

### Build Process Flow
```
1. Coolify pulls code from GitHub
2. Nixpacks detects Laravel application
3. Node.js 18 environment is set up
4. npm ci installs dependencies
5. npm run build executes Vite build
6. Vite processes CSS with Tailwind plugin
7. Bootstrap import fails due to incorrect path
8. Build fails and deployment stops
```

### Fixed Build Process Flow
```
1. Coolify pulls code from GitHub
2. Nixpacks detects Laravel application
3. Node.js 18 environment is set up
4. npm ci installs compatible dependencies
5. npm run build executes Vite build
6. Vite processes CSS with correct Bootstrap path
7. Build completes successfully
8. Application deploys and starts
```

## Components and Interfaces

### 1. Package Configuration (`package.json`)
- **Purpose**: Define compatible package versions and npm engine overrides
- **Changes**: 
  - Downgrade `laravel-vite-plugin` to version compatible with Node.js 18
  - Downgrade `vite` to version compatible with Node.js 18
  - Add engine override configuration if needed

### 2. CSS Import Configuration (`resources/css/app.css`)
- **Purpose**: Correctly import Bootstrap styles
- **Changes**:
  - Fix Bootstrap import path from `bootstrap/scss/bootstrap` to `bootstrap/dist/css/bootstrap.css`
  - Ensure all other imports use correct paths

### 3. Vite Configuration (`vite.config.js`)
- **Purpose**: Configure build process for production deployment
- **Changes**:
  - Add resolve aliases if needed
  - Configure build options for production
  - Ensure compatibility with Coolify environment

### 4. Environment Configuration
- **Purpose**: Provide proper environment variables for production deployment
- **Changes**:
  - Ensure APP_ENV is set to production in deployment
  - Configure proper APP_URL for deployed environment
  - Set appropriate debug settings

## Data Models

No data model changes are required for this fix. The issue is purely related to build configuration and asset processing.

## Error Handling

### Build Error Recovery
- **Bootstrap Import Errors**: Use correct import paths that match installed package structure
- **Node Version Warnings**: Use compatible package versions or configure npm to ignore engine checks
- **Asset Resolution Errors**: Ensure all import paths are resolvable during build

### Deployment Error Prevention
- **Pre-deployment Validation**: Test build process locally before deployment
- **Environment Variable Validation**: Ensure all required environment variables are set
- **Dependency Validation**: Verify all dependencies are compatible with deployment environment

## Testing Strategy

### Local Testing
1. **Build Test**: Run `npm run build` locally to verify build completes without errors
2. **Asset Verification**: Check that all CSS and JS assets are generated correctly
3. **Bootstrap Styles**: Verify Bootstrap styles are properly included in built assets

### Deployment Testing
1. **Coolify Build Test**: Deploy to Coolify and monitor build logs for success
2. **Application Functionality**: Verify deployed application loads and displays correctly
3. **Style Verification**: Confirm all Bootstrap and custom styles render properly

### Regression Testing
1. **Development Environment**: Ensure changes don't break local development
2. **Hot Reload**: Verify Vite dev server still works with changes
3. **Asset Processing**: Confirm all assets process correctly in both dev and production modes

## Implementation Approach

### Phase 1: Fix Bootstrap Import
- Update CSS import path to use correct Bootstrap distribution file
- Test local build to ensure Bootstrap styles load correctly

### Phase 2: Resolve Node.js Compatibility
- Identify compatible versions of laravel-vite-plugin and vite for Node.js 18
- Update package.json with compatible versions
- Test build process with new versions

### Phase 3: Optimize for Coolify
- Review and optimize vite.config.js for production builds
- Ensure environment variables are properly configured
- Test complete deployment process

### Phase 4: Validation and Documentation
- Perform comprehensive testing of deployment process
- Document any environment-specific configurations
- Create deployment troubleshooting guide if needed