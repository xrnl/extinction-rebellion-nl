## Sync production data

1. [Contact](/SUPPORT.md) one of the website admins for:
  - obtaining an account on the live website. You'll need this to work on the
  website locally.
  - the connection string. You need this to get the data from the live website
  and replicate that website locally. The admin can get the connection string
  with these steps: 
    - Go to `Tools > MigrateDB`
    and 
    - Select the `Settings` tab.
    - Copy the connection string. It should
   look like `https://extinctionrebellion.nl/wp{{HASH}}` 
2. Visit http://localhost:8000 to setup wordpress and login
3. Navigate to the `Plugins` page: http://localhost:8000/wp/wp-admin/plugins.php
4. Activate `WP Sync DB` and `WP Sync DB Media Files` plugins
5. Once you have the account and connection string from step 1, use it to pull
   the data from the live site:
  - navigate to `Tools > MigrateDB`: http://localhost:8000/wp/wp-admin/tools.php?page=wp-sync-db
  - select `pull` 
  - enter the connection string you got from step 1
  - replace: 
    - `//extinctionrebellion.nl` => `//localhost:8000` 
    - `/var/www/extinction-rebellion-nl/web` => `/var/www/html/web` 
    - `extinction-rebellion-nl.daan-mac` => `localhost:8000`
  - select `Media Files` checkbox at the bottom 
  - hit `Migrate DB` button. 
6. Wait until the data has finished migrating. This can take up to 15 minutes.
7. Once the data has finished migrating, login at
   http://localhost:8000/wp/wp-admin with your username and password _from the
   live website_. The reason you need to use the same credentials as in the live
   website is because when you migrated the data from the live website you also
   migrated all login credentials. 
8. (optional) [make yourself admin](docs/becoming_admin.md) if you need access
   to all functionalities of the website. When you first get an account on the
   live website you will have limited permissions so that you can only change a
   restriced part of the live website. However, this also means that, after
   pulling the live site data, you will have restricted permissions in your
   local website, and you might not have access to all the functionality you
   need to do your work. By changing your local permissions to "admin" you will
   get access to all functionalities. 
