
## Syncing custom fields

When you want to create a new page or page template, you may want use custom fields. Custom fields allows you to customize what type of content you want to add to the page. You can learn more about Advanced Custom Fields on [their website](https://www.advancedcustomfields.com/resources/).

When you create a new custom field/group, it creates a file containing the type information in json format. This is usually stored in `web/app/themes/xrnl/acf-json/` directory. When you make modifications to any custom fields, it modifies this json. It is important that you commit these fiels to git.

Here's a [PR for about page](https://github.com/xrnl/extinction-rebellion-nl/pull/35), where you can see this for example.

Once your PR is merged and deployed, you must update the content in production. The fields (content type only) that you generated on your local are now ready to be synced in production. In wordpress admin, if you visit `Custom Fields` in the sidebar and click on "Sync available" you should be able to see something like

<img src="/docs/sync-screenshot.png" width="200" />

Select the fields you want to sync and then hit apply. Your fields should be ready. Now all you need to do is create the page and use the custom fields you just created.

_This doc needs further improvements._
