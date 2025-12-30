#!/bin/bash
# Fix MongoDB Extension SSL Support
# Run this via SSH on your Forge server to reinstall MongoDB extension with SSL support

set -e

echo "🔧 Fixing MongoDB extension SSL support..."
echo ""

# Step 1: Install OpenSSL development libraries
echo "📦 Installing OpenSSL development libraries..."
sudo apt-get update
sudo apt-get install -y php8.4-dev pkg-config libssl-dev libcurl4-openssl-dev build-essential

# Step 2: Remove existing MongoDB extension if installed
echo "🗑️  Removing existing MongoDB extension..."
if php -m | grep -q mongodb; then
    echo "  Extension is currently loaded, removing..."
    sudo rm -f /etc/php/8.4/cli/conf.d/20-mongodb.ini
    sudo rm -f /etc/php/8.4/fpm/conf.d/20-mongodb.ini
    sudo service php8.4-fpm restart || sudo systemctl restart php8.4-fpm
fi

# Step 3: Uninstall existing PECL package
echo "🗑️  Uninstalling existing MongoDB PECL package..."
sudo pecl uninstall mongodb 2>/dev/null || echo "  No existing package to uninstall"

# Step 4: Reinstall with SSL support
echo "📦 Reinstalling MongoDB extension with SSL support..."
sudo pecl install mongodb <<< ""

# Step 5: Find and enable the extension
echo "📝 Enabling MongoDB extension..."
MONGODB_SO=$(find /usr -name "mongodb.so" 2>/dev/null | head -1)

if [ -z "$MONGODB_SO" ]; then
    echo "❌ Could not find mongodb.so file"
    exit 1
fi

echo "✅ Found MongoDB extension at: $MONGODB_SO"

# Add to CLI
echo "extension=mongodb.so" | sudo tee /etc/php/8.4/cli/conf.d/20-mongodb.ini

# Add to PHP-FPM
echo "extension=mongodb.so" | sudo tee /etc/php/8.4/fpm/conf.d/20-mongodb.ini

# Restart PHP-FPM
echo "🔄 Restarting PHP-FPM..."
sudo service php8.4-fpm restart || sudo systemctl restart php8.4-fpm

# Step 6: Verify SSL support
echo "✅ Verifying installation and SSL support..."
if php -m | grep -q mongodb; then
    echo "✅ MongoDB extension successfully installed!"
    echo ""
    echo "Testing SSL support..."
    php -r "echo extension_loaded('mongodb') ? 'MongoDB extension loaded' : 'MongoDB extension NOT loaded'; echo PHP_EOL;"
    echo ""
    echo "✅ Installation complete! You can now run:"
    echo "   php artisan mongodb:setup"
else
    echo "❌ Extension installed but not loading. Check php.ini files."
    echo "Run: php --ini"
    exit 1
fi

