# How to contribute to the website of Extinction Rebellion NL

Hey there :wave::smile:, we are excited that you want to contribute to the
website of Extinction Rebellion NL! Please read this guide to learn how you can
best contribute. In this guide you will find instructions on how to:

- [Join the team](#join-the-team)
- [Identify where to help out](#identify-where-to-help-out)
- [Change the website content](#change-the-website-content)
- [Change the website code](#change-the-website-code)
- [Contribute without programming](#contribute-without-programming)
- [Share feedback](#share-feedback)

## Join the team

### Contact us

The first step in joining the website team is to [contact us](/SUPPORT.md) and
let us know that you would like to help out. We will then:

- Arrange an introduction call to get to know each other, tell you more about
  the website, help you figure out how to help out and answer any questions that
  you might have.
- Give you an invite to Mattermost, our internal communication platform, so that
  you can communicate with the rest of the team through our [website
  channel](https://organise.earth/xr-netherlands/channels/xrnl-website)
- Give you an invite to [our Trello](https://trello.com/b/4yGL5KAJ/xrnl-website),
  where we manage all our tasks.

### Join project meetings

Every other Thursday at 19:00 we hold a brief and efficient online meeting to
review the progress from the previous 2 weeks, resolve questions about current
work, discuss ideas and set goals for the next two weeks. We highly recommend
you attend these meetings so that you can get to know the team, participate in
discussions and volunteer for tasks that you're interested in. You can join the
online meeting using [this link](https://meet2.organise.earth/b/tec-wd7-zfg) on
the next week that lands on an [odd week
number](https://www.epochconverter.com/weeknumbers).

## Identify where to help out

In [our Trello](https://trello.com/b/4yGL5KAJ/xrnl-website) you can find the
complete list of things that we want to improve on the website. These criteria
might help you figure out where you can help out:

- The right-most column has the tasks with the highest priority, and tasks
  higher up in each column usually have higher priority.
- These labels are used to indicate what work is needed and who could best help
  out:
  - `Wordpress`: content needs to be changed on the live website. Anyone with a
    website account can do this.
  - `Design`: a design is needed, which will then be coded into the website.
    Designers are needed for these tasks.
  - `Code`: the website code needs to be changed. Programmers are needed for
    these tasks.
- The `bug` label is used to indicate that somethig is broken and
  quickly needs to be fixed, the `enhancement` label indicates an existing
  functionality needs to be improved, and the `feature` label indicates that a
  new website functionality needs to be improved.

If you're still unsure what is most important or where your help is needed most,
you can always [contact us](/SUPPORT.md).

Lastly, you're also very welcome to propose and implement your own ideas for
improving the website.

### How tasks are prioritised

Tasks are prioritised in terms of how much they contribute to our 3 main website
goals:

1. Persuade people about:
   - the gravity and urgency of the climate and ecological crisis.
   - the need of XR and its tactics to get governments to address this crisis.
   - the importance of them joining XR in order to help address this crisis
2. Make it very easy for new people to get actively involved in XR. ‘Actively
   involved’ means that they either attend XR events, participate in actions,
   volunteer within the movement or donate.
3. Keep rebels engaged within the movement through content such as press
   releases, blogs, rebel radio...

## Change the website content

Since this website is developed in Wordpress, you can change most of the text
and images of the website using the Wordpress editor. To access the Wordpress
editor of the website you'll need to log in the [website admin
page](https://extinctionrebellion.nl/wp/wp-admin/) using your account, which you can
obtain by [contacting us](/SUPPORT.md).

The best way to undestand how the Wordpress editor works is to try to change
some content and then to see a preview of your changes by clicking `see edits`
under the `publish` panel on the right. If you want to learn more about how to
master the Wordpress editor you can see one of the many good tutorials that you
can find online, or ask us directly.

### Translating website content

When changing the website content it is important (and often forgotten) to
change the content in both languages of the website. You can do this by clicking
on the `translate this document` button in the `language` panel on the top right
of the editor.

## Change the website code

### Learn relevant technologies

To effectively contribute to the website code, it is useful if you have some
knowledge and experience with the technologies that are used for its
development. The main technologies are: HTML, SCSS, PHP and WordPress. In
addition, it is also useful to know about two WordPress plugins we often use:
Advanced Custom Fields (ACF) and WordPress Multilingual (WPML) plugin.

Don't worry if you don't have prior experience with these technologies!
Contributing to the development of an application is the best way to learn, and
most of the developers in the website team started off without prior experience
with most of these technologies. We recommend that you first learn the basics by
reading the documentation of each technology and apply what you learn to
implement a small fix or improvement. When you submit your change, more
experienced developers will give you constructive feedback and aid you in your
learning.

### Process for making changes

#### 1: Install and run the application

You can install and run the application by following the instructions in the [README](/README.md).

#### 2: Setup the fork-and-pull development model

To combine your changes with existing code we recommend that you use the _fork
and pull_ [collaborative development model](https://help.github.com/en/github/collaborating-with-issues-and-pull-requests/about-collaborative-development-models).
By following this model you can submit changes without needing write access to
the main repository. If you haven't worked with this model before, we recommend
following [this guide](https://blog.scottlowe.org/2015/01/27/using-fork-branch-git-workflow/).

Later in the project, we'll give you write access to the xrnl website repository
so that we can easily change code in each other's branches.

#### 3: Make your changes

Next, you can change the code in order to implement the fix or improvement you
want to work on.

##### Beware of translations

Remember that all static text on the website must be translated. So instead of
directly writing text on the website:

```html
<p>
  Your new text
</p>
```

We use the following function so that we can translate the text with WPML

```html
<p>
  <?php _e('Your new text', 'theme-xrnl'); ?>
</p>
```

Once these translation functions are in your code you can add the missing
translations on the live website by following the instructions in step 5.

##### Use custom fields over static strings

Ideally, most text and images can be edited from the WordPress admin panel, so
that we don't need to change the code for minor content changes. You can achieve
this by using [Advanced Custom Fields](https://www.advancedcustomfields.com/resources/).

So instead of writing (translated) text into the code, you add some code to
render the data that is entered through Wordpress. 

```html
<p>
  <?php the_field('about'); ?>
</p>
```

The easiest way to understand how to use these custom fields is to see existing
pages that use them.

#### 4: Make a pull request

When you've finished making changes, and your code works as expected, you can
make a pull request with the following details:

1. Merge into the `master` branch of the `xrnl` repository.
2. Reference the Trello task that this pull request solves.
3. Explain all changes you have made in this pull request. If this pull request
   changes the interface you should include screenshots of the interface before
   and after your changes.
4. Explain why you have made these changes.
5. Explain parts of the code that might be difficult to understand. This makes
   it much easier for the maintainer to review your code.

When you submit or update your pull request, you should receive a reply within 2
days. If the reviewer request changes, you should repeat steps 3 to 6. Note that
you don't need to make a new pull request. You can push to your branch and the
pull request will be automatically updated with your latest changes.

#### 5: Add new content to the live website.

For many changes, you will likely change some code and add some text or images
through the WordPress admin panel. The code can be automatically deployed to the
live website, but the content changes need to be manually added, because
pushing content from your local website to the live website risks overwriting
new content.

Therefore, if your change has content changes:

1. After the code in your pull request is merged into the master branch, wait
   until the new code in the master branch is deployed to the live website.
2. When your new code is live manually copy-paste the content from your local
   website to the live website. Or if the content needs to be added by someone else
   in Extinction Rebellion, ask them for the content (in both languages). In
   some cases, when a person or group needs to add a lot of content to a page,
   or post frequent updates to a page, we will give them an account on the
   website so that they can make the changes themselves without our help.
3. Lastly, add missing translations by following the following steps. If you
   don't have permissions to access this panel, contact the website team for
   help.
      1. Go to the WordPress admin panel at `/admin`
      2. On the left side bar, hover over `WPML` and click on `localization of
         themes and plugins`
      3. Under the section `string in themes` select `XRNL` and click `scan
         selected theme's for strings`
      4. On the left side bar, hover over `WPML` and click on `string
         translation`
      5. Find the strings that you need to translate by selecting in the first
         menu
      6. `translation needed` and in the second menu `theme-xrnl`
      7. Add missing translations.

## Contribute without programming

There are many, many ways in which you can contribute to the website without
programming. We need the help of

- Designers who can improving the website interface design or user experience.
- Writers who can improve the clarity and impact of the website text.
- Data analysts who analyse our website analytics, conduct A/B testing and make
  improvements.
- Integrators who recruit and integrate new people into this project.
- People who get feedback for the website from the wide variety of groups in XR
  NL.

If you want to contribute to this project in one of these ways, or any other
way, please [contact us](/SUPPORT.md)!

## Share feedback

We really value your feedback so that we can continually improve the website and
the way we work on the website. One of the best ways to share your feedback is
by attending the website team meetings. Other ways to share feedback is to
participate in our [website Discourse](https://base.extinctionrebellion.nl/c/tech/website/62) 
or simply [send a message in the website channel](/SUPPORT.md).

---

Again, we are very happy you want to contribute,

With love :green_heart:, rage :fire: and respect :seedling:,

Website team of Extinction Rebellion Netherlands
