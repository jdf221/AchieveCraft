# AchieveCraft.net
### Very old project of mine from when I was 15 in 10th grade.
I was decently experienced in PHP at the time but semi new to JS.

I've put the site up at https://achievecraft.jdf2.org. This site was used to generate Minecraft achievement images which people would use in their signatures. Using PHP GD library to add text and an icon over an image and serving that image dynamically based on the text passed in via the URL.

The JS used to run the preview and icon selector on the home page I was pretty proud of. Using jQuery cause it was 2016 and that was still hip.
https://github.com/jdf221/AchieveCraft/blob/master/public/js/init.js

Although looking at it now I apparently wasn't proud of it back then according to my comments. But honestly it's not horrible.

The PHP code is eh ok, everyone hates looking at code from when they were first starting out. It's pretty ok though used MongoDB to store icons uploaded, had a cache so images wouldn't need to be regenerated, abstracted away the database interaction from the actual generation code. I think this was when I was really starting to grasp good project design ideas like seperation of concerns. Although the MongoDB code isn't amazing.

I also ran a URL shortener for this because people had limited characters in their forum signatures which is where these images were used. I've uploaded that here: 

___
### Original Readme
---

Because achievecraft.com is no longer up.

(Does not include avatars anymore because [there](https://crafatar.com/) [are](http://visage.surgeplay.com/) [tons](https://minotar.net/) [of](https://pixelface.net/) [alternatives](http://mcapi.ca/examples/avatar-api). Requests to old avatar paths will redirect to mc-heads.net)

___

## How are the achievements made?

The achievements are made in /backend/Achievement.class.php

This class can be used by its self with out the rest of this repository. (Even the icon class. This class takes a GD image resource for icons)

Feel free to use Achievement.class.php in your own projects.

___

## Caching

Icons and achievements are cached in the `cache` dir. Achievement cache names are the icon id + top text + bottom text then hashed using MD5. Same for icons but just the icon id.

Also cached client side if possible. (ETag. Expires +1 week)

___

## Icons

Icons are all stored in a MongoDB database. But the Icon.class.php doesn't require a Mongo database, it takes a function and when needed it will call that function with the icon id. What ever that function returns is used as the icon. (For example look at line 49 of AchieveCraft.class.php)
