# Reusable Field Group Field for ACF Pro
Version 1.0.0 (see changelog.txt)

***This plugin has not been updated or maintained in some time. I recomment before using this to use the new Clone field, see below...***

## Important note before you decide to use this plugin
***ACF Version 5.4 will include a new "Clone" field that should do almost everything that this add on does. If you need this functionality and you're not already using this plugin on a site then I strongly suggest that you wait until the this version of ACF Pro is released. This version of ACF is already available in Beta if you log into your account over on the ACF site. This plugin is not compatable with the new clone field and there will not be any way for you to transfer data from fields of this plugin to fields of the new pluging without an extreme amount of work.***

***For those that are using this plugin and would like to attempt to move the data I would suggest looking at [WP All Import](http://www.wpallimport.com/). This plugin has an ACF add on that I think could be used to get the data transfered. My theory is that you can use the standard WP Export to export posts and then use WP All Import to update the existing posts moving that data from the fields uses in this plugin to the fields of the new clone field. But this is just a theory and it would need to be tested.***

## How it works
Field groups are rebuilt using local field groups that override existing field groups.

## Why only ACF5
acf_local is not supported in ACF4

### Installation
Download and unzip to /plugins/acf-reusable-field-group-field

### Using
Using this add on in the admin should be pretty self explanatory. When creating a field group you add a 
reusable field group field and select the field group you want to include.

Care should be taken when 
selecting field groups to reuse as it is possible to create an infinite loop if you create a
self-referencing loop of field groups. I have put in a test to attempt to catch these infinite loops
and abort the rebuilding process and I've tested it as well as I could, but you never know.

Using the fields from the field groups create by this add on will be a little more difficult. All of 
the standard ACF functions should work, but the field names and field keys of the fields will be altered.
Their is nothing in the admin that will tell you what these new field names and field keys are so you'll
need to figure that out on your own. You can also look in the generated JSON for the new field group by
looking in the `acf-json` folder in this plugin.

You can turn off the renaming of field names and feild keys, however, I would not suggest this. ACF requires
unique field names and unique field keys to function properly. Turning of the renaming may have unintented
side effects. There may be very limited cases where turning it off will work, but I have not tested this.

The following is a basic outline of how the field names and field keys are renamed.

#### Field Name Prefixing

Let's say that you create a field in a field group that you want to reuse and you name this field `text_field`.
In another group you create a resuable field group field and you name this field `reusable_group`. The new name
of the text field, and the name you will need to use in all ACF functions will be `reusable_group_text_field`.
The name of the resusable field group field will prefix each of the fields in the resused field group..

#### Field Key Prefixing

Lets assume that you have the same conditions as described above and that the field key for the `text_field`
is `field_56351ab9271b8` and the field key for `reusable_group` is `field_56351aa7271b7`. The new field 
key will be `field_56351aa7271b7_56351ab9271b8`. ACF field keys must begin with `field_`. The second 
section of the new key is the unique ID from the reusable field group key with an added underscore 
`56351aa7271b7_` and the last section of the new key is the unique ID from the field in the group 
that is being reused `56351ab9271b8`.

#### Compound Field Names and Keys
It is posssible to reuse a field group that included resusable field group fields. In this case the field names
and keys will be prefixed again, for example `resuable_field_reusable_field_text_field` and
`field_56351aa7271b7_56351ab9271b8_56351ac768a9`. Care should be taken with compound resusable field groups so
that you do not exceed any limitations of field names that may be imposed by the database, for example option_name in the options table.

#### When Can You Turn Off Field Name/Key Prefixing?
Field name and field key prefixing is not always needed. It really depends on where and how you'll be reusing field groups. See [the comment I made on this issue](https://github.com/Hube2/acf-reusable-field-group-field/issues/15#issuecomment-180020166). Understanding where and when it can be turned off requires an understanding of how ACF stores data for custom fields.

### Local JSON
Like ACF, this plugin uses Local JSON to improve performance. The plugin includes it's own acf-json folder. To take advantage of this feature this folder must be writeable by PHP.

### Disable local JSON
You can disable the saving of local JSON file by including the following in wp-config.php
```
define('ACF_REUSABLE_DISABLE_JSON', true);
```
This will disable the saving of local JSON files in this pluin. Please note that this will cause the
all field groups that include reusable fields to be rebuilt on every page load. This rebuilding of
field groups can cause significant performance issues and can cause caching issues with persistent
caching plugins and applications.

### Bugs, Problems, Questions?
[Please let me know in if you have any problems with this plugin working.](https://github.com/Hube2/acf-reusable-field-group-field/issues)
If you have questions about how to do something, please do not email me to ask them.
[Please post them in issues instead](https://github.com/Hube2/acf-reusable-field-group-field/issues), 
I will handle support here on GitHub.

### Donations
If you find my work useful and you have a desire to send me money, which will give me an incentive to continue
offering and maintaining the plugins I've made public in my many repositories, I'm not going to turn it down
and whatever you feel my work is worth will be greatly appreciated. You can send money through paypal to
hube02[AT]earthlink[dot]net. 

#### Automatic Updates
Install [GitHub Updater](https://github.com/afragen/github-updater) on your site if you want to recieve automatic
updates for this plugin.

#### Remove Nag
You may notice that I've started adding a little nag to my plugins. It's just a box on some pages that lists my
plugins that you're using with a request do consider making a donation for using them. If you want to disable them
add the following filter to your functions.php file.
```
add_filter('remove_hube2_nag', '__return_true');
```
