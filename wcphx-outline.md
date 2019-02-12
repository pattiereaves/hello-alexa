# Make your website talk: How to use WordPress to power an Alexa Skill

In this talk, we’ll walk through setting up an Alexa Skill using the VoiceWP plugin. Participants will learn how to test a skill locally, develop it using the WordPress REST API, and publish the skill to the Alexa marketplace.

Demo an Alexa Skill

What makes a good Alexa skill?
- Something that works for a hands-free moment (e.g. while cooking dinner)
- Something that is triggered by an activity the user is doing (i.e. it's time to feed the dog)
- Something that doesn't take a lot of back and forth with the user (voice interactions are not long)

An overview of how Alexa Skills are engineered using VoiceWP

You configure an API on your server
You configure your skill on Amazon
The user installs your skill on their device
When the user makes a request to the skill, it sends that to your endpoint
You can pass session variables back and forth to the endpoint

Requirements
- Amazon Developer account
- Relatively modern WordPress installation

How to develop

Start by getting all the Amazon things ready
Go to https://developer.amazon.com/alexa
Create skill
Custom / Self Hosted
Start from Scratch'
Invocation name

Get your WordPress set up
https://github.com/pattiereaves/hello-alexa
wp-content directory
required plugins - wordpress fieldmanager, voicewp
can use any theme
can place the code in the theme if you really want
our custom code is going to go in this plugin hello-alexa

npm init
npm install bespoken-tools -D
npm Start
click on the dashboard link


virtual box
need to make sure that you are forwarding port 9994
proxy pass localhost:9994 to your site.

set up proxy in vagrant

enter endpoint
create intent, invocation phrases
save model
build the interaction model
Skill testing enabled in `development` open

todo
- beta test
- skill description
