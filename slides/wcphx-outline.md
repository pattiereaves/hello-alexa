## Demo an Alexa Skill

- Open word camp
- What word camps are today

---

## What I'm going to do today

Note:
In this talk, we’ll walk through setting up an Alexa Skill using the VoiceWP plugin.
- test a skill locally
- develop it using the WordPress REST API
- publish the skill to the Alexa marketplace.

---

## Who am I

- Pattie Reaves
- Senior UX Developer at Alley Interactive
- Distributed company
- We're hiring scrum masters, ux developers, javascript developers and wordpress developers
- I've been there for three years
- From Maine, moved to Tucson last year
- Great place to work, ask me about it after this talk

---

## How I got into Voice

- Colleague started developing the VoiceWP plugin
- Got a Knight Foundation to make a skill for a Cooper Hewitt Smithsonian Design Musem where the user is "walking around in a gallery" using an Alexa skill
- Accessibility
- Relatively new technology
- Mobile first of this decade

---

## What is VoiceWP

Note:
- Plugin that allows you to make an Alexa skill on a system you're already using.
- No need to set up Amazon s3 buckets or any of that jazz
- it does ship with some "fill out the fields and go" functionality of you want to make a blog reader type skill, but I'm not going to go into that today.

---

## What makes a good Alexa skill?

Note:
- Something that works for a hands-free moment (e.g. while cooking dinner)
- Something that is triggered by an activity the user is doing (i.e. it's time to feed the dog)
- Something that doesn't take a lot of back and forth with the user (voice interactions are not long)

---

## But this isn't a talk about what makes a great voice user interface

Note:
- [Designing Voice User Interfaces book]()


---

## An overview of how Alexa Skills are engineered using VoiceWP

Note:
[Image of the workflow]
You configure an API on your server
You configure your skill on Amazon
The user installs your skill on their device
When the user makes a request to the skill, it sends that to your endpoint
You can pass session variables back and forth to the endpoint

---

## What you need to get started

- Amazon Developer account
- Relatively modern WordPress installation
- Local development environment that runs WordPress (I use a flavor of VVV)

---

## How to develop

- Start by getting all the Amazon things ready
- Go to https://developer.amazon.com/alexa
- Create skill
- Custom / Self Hosted
- Start from Scratch
- Invocation name

---

## Get your WordPress set up

- https://github.com/pattiereaves/hello-alexa
- wp-content directory
- required plugins - wordpress fieldmanager, voicewp
- can use any theme
- can place the code in the theme if you really want
- our custom code is going to go in this plugin hello-alexa

---

## Bespoken tools

- npm init
- npm install bespoken-tools -D
- npm Start
- click on the dashboard link

---

## Enabling your local development environment

- virtual box
- need to make sure that you are forwarding port 9994
- proxy pass localhost:9994 to your site.
- you can set up the proxy in vagrant manually by editing the Vagrant file.

---

## Connecting the two

- enter endpoint
- create intent, invocation phrases
- save model
- build the interaction model
- Skill testing enabled in `development` open
