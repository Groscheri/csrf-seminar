# Group 12

Title: A research on “Heartbleed” security vulnerability in OpenSSL

1. Aim and Scope

Describe, in your own words, the aim of this report and its scope. Use
just a few sentences. This way, you help your classmates to check
whether the message they intended to transmit and the one you got are,
indeed the same. Additionally, consider these questions:

    * Is the aim of the report clearly stated?
    * Is the scope of the report clearly delimited?
    * Does the report fulfill its aim?

===

The word "Heartbleed" cannot be found neither in the abstract nor in the
introduction. That makes you wonder if the aim of this report is general
vulnerabilities in OpenSSL or the bug Heartbleed. Another troublesome
aspect is that the authors presumes the reader is already familiar with
the Heartbleed bug, giving no brief information about the subject. It can
be difficult to realize what the aim is if there is no explanation. On the
other hand, it clearly states that there will be an introduction to OpenSSL
and some analysis of its source code  for a deeper understanding on how and
why this fearsome bug appeared in the first place.

Sometimes the authors deviate from the aim and scope, giving detailed 
descriptions of licenses and programming languages. Otherwise the report is
fulfilling this part.

Hint: Explain Heartbleed and OpenSSL as soon as possible.

===

2. Organization

Examine the overall structure of the document. Consider the following
questions:

    * Is the report well structured?
    * Are headings and subheadings titles appropriate? Do they reflect
the structure and content of the whole report?
    * Are terminology and definitions introduced before being used?
    * Is the logical flow of the text easy to follow?
    * What improvements to the structure of the document would you suggest?

===

There is an abstract and introduction, although a bit short. The third and sixth
headings are a bit confusing: Influence & Influence and Prospect. Try to use 
other words here. There is nothing wrong with "Literature Study", but I, as a 
reader, consider this whole report as a literature study. Which makes the
discussed header obsolete - replace it with something better.

The lack of a conclussion bothers me enormously, as that is the final piece
that gives us an insight in what the authors thinks about this particular
subject.  

Source code analysis have a lot of text while not being supported by almost
any reference. The acronym SSL is never explained in the text. There are 40
matches when searching for it, but nowhere does it explain what it is.

===

3. Layout and Typesetting

Examine the layout and typesetting of the document. Consider the
following questions:

    * What kind of template has been used? Is it suitable for the task?
    * Is the over all impression of the document "scientific"?
    * How is the text divided into paragraphs? Should more/less
paragraphs be used?
    * Are there any typesetting errors such as text running off the page?
    * Are the fonts suitable and easy to read?
    * How are figures and illustrations integrated in the text? Are they
placed so that the reader have them at hand when reading related text?
    * What improvements to the Layout and typesetting would you suggest?

===

The template is custom made in some normal text-editor. A more suitable template
would be a standard document done in LaTeX. It is advisible to use LaTeX as it
it one of the most accepted way of writing scientific reports.

If the authors choose to continue with this custom made template, please change
the font of the headers as they are too thin in comparison to the paragraph type
setting. The first page should only reveal the abstract at most.

===

4. Illustrations

Examine the illustrations (and figures) in the report (if any). Consider
the following questions:

    * What messages are being conveyed by the illustrations which can
not be better explained in text?
    * Are the illustrations related to the content of the report?
    * Are the illustrations referenced in the text?
    * Are the illustrations made with a suitable resolution to avoid
artifacts and other visual flaws?
    * Are the illustrations made so that they can still be understood if
printed black-and-white?
    * Are all illustrations either original work or their source (and
licence information) clearly stated?
    * What improvements to the illustrations would you suggest?

===

There are no illustrations in this report. If an explanation is done on
Heartbleed and the relation with OpenSSL, there could easily be at least
one illustration demonstrating the vulnerability.

The code parts are generally good. Those with bad eye-sight might have 
problems seeing which code is old and which one is new (bold).

===

5. Readability

Read through the report carefully. Take special note of any part of the
text which you find hard to read. Then consider the following questions:

    * Are there any passages you had to reread? If so, why (e.g.,
undefined terminology, vocabulary, language issues, etc.)?
    * Is the overall language and tone of the document suitable for a
scientific report?
    * Are there spelling/gramar mistakes? Where?
    * What changes would you suggest to improve the readability of the
report?

===

The abstract and introduction is very hastly done. It is hard to get a grip
about the report at first. Might have to flesh it out a bit and make it easier
to grasp.

Most references are good, but there are some black sheeps. Reference 10 is way
too abstract to understand. You are not supposed to google the references, they
should be pointing directly to the source. Heartbleed.com is also very
generalizing and don't cover that much.

There are some minor spelling mistakes, but nothing too worrying.

===


6. References & Originality

Go through the list of references. Choose a few (3-5) and answer the
following questions:

    * Is the reference correctly formatted (authors, title, year,
publication, URL etc.)?
    * Is the reference cited in the text?
    * Can the reference be located based on the information in the
report? (Make sure you save the documents, you will need them in a moment!)
    * Is the reference suitable for a scientific report?

Read through the report once more.

    * Is it clear what is the authors' opinion and what comes from
referenced sources? (Citation vs original work)
    * Are there any unsupported statement or claims that would benefit
from a reference?
    * Does the references used support what is written in the report?
(Verify original sources if needed!)
    * What other changes would you suggest to improve the references?

===

As stated earlier, in 5. Readability, some references are not on par with
similar scientifical reports. The third paragraph in Source Code Analysis
states that the Heartbleed is completely annihilated. That are some huge
claims and should be backed up with proper references.

I would take another look on reference 6, 10 and 11. They are simply not
very useful and doesn't bring clarification in what you've borrowed and
what you've wrote alone.

The other references are good and give a good understanding of the report.

===

7. Scientific Rigour

Consider the following questions:

    * Is the reasoning sound? Does it follow the scientific method?
    * Does the experiments, if any, support the reasoning?
    * What changes would you suggest to improve the scientific rigour of
the report?

===

The two most studies are usually literature and practical. Oftenly they are
combined as it is hard to describe or prove from only one perspective.
As there is no practical influence, the literature part has to be stable.
The last part of the report, Influence and Prospect, shortly describes some
improvements but doesn't really dwell in that are for that long. Everything
that can be explained more detail (keep the aim and scope in mind) should be
described more intensly.

Remember that a document with 100% text won't make the reader happy. Add 
some explanatory pictures or more code to give the report more volume.

Lastly, using LaTeX would improve this report instantly by 300% as this
custom made template is far to off from normal scientific reports.

===

Overall feedback

===

This report is based on a custom made template that doesn't follow scientific 
report standards. Using a tool like LaTeX can easily eradicate this problem, 
including abnormal type settings for headers and some code parts. Some 
references have to be checked, some have to be added/removed to the text. Using 
references for big assumptions is crucial for the validity of the report. 
Illustrations and some more code would probably give this report some volume 
and a greater readability. Lastly the explanation of commonly used terms such 
as Heartbleed and SSL should be available for the reader at the beginning of 
the report.

With these small changes, a well constructed report can emerge from this 
current document. A lot of small things makes the report worse than it is. 
Correct at least some of these points above and you'll have a well constructed 
report at the end of the day.
