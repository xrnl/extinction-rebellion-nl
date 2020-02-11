
## Sync production data

1. Visit http://localhost:8000 to setup wordpress and login
2. Navigate to **Plugins** page (http://localhost:8000/wp/wp-admin/plugins.php)
3. Activate **WP Sync DB** and **WP Sync DB Media Files** plugins
4. Get connection info to sync the production database by logging in to extinctionrebellion.nl/wp/wp-admin/. To get the connection string:
    - Go to _Tools > MigrateDB_ and
    - Select the _Settings_ tab.
    - Copy the connection string. It should look like `https://extinctionrebellion.nl/wp{{HASH}}` (contact the **Tech team** if you don't have a login)
5. Navigate to _Tools > MigrateDB_ (http://localhost:8000/wp/wp-admin/tools.php?page=wp-sync-db) on your **local instance**, select _pull_ and enter the connection string you got in the previous step.
    Replace:
    - `//extinctionrebellion.nl` => `//localhost:8000`
    - `/var/www/extinction-rebellion-nl/web` => `/var/www/html/web`
    - `extinction-rebellion-nl.daan-mac` => `localhost:8000`

    and select "Media Files" checkbox at the bottom and hit "Migrate DB" button. It will take a minute or so and then you will be prompted to login.
6. Use your extinctionrebellion.nl login to login at http://localhost:8000/wp/wp-admin
