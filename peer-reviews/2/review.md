# Group 25

Title: Stealth mining through XSS for Bitcoin

1. Aim and Scope

Describe, in your own words, the aim of this report and its scope. Use
just a few sentences. This way, you help your classmates to check
whether the message they intended to transmit and the one you got are,
indeed the same. Additionally, consider these questions:

    * Is the aim of the report clearly stated?
    * Is the scope of the report clearly delimited?
    * Does the report fulfill its aim?

===

The aim of this report and its scope is to introduce a use case of XSS web 
vulnerability. It deals with a concrete exploit in order to generate (mine) 
Bitcoin (a cryptocurrency) on victims' behalf. Description of Bitcoin and 
explanations about XSS & CSRF web vulnerabilities are given before going 
through the exploit.

The aim of the report is clearly stated and the scope is clearly delimited as 
stated above. This report fulfill its aim even though it could have been really 
interesting to give more details about the architecture used and the 
interactions (protocol, network communication, etc.). For instance, describing 
communications between each actors: attacker, victims, vulnerable web server 
(chat), proxy, miner, etc. would have been given a better understanding of the 
whole exploit.

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

The report is very well structured with an introduction and a conclusion. So 
are headings which follow a logical flow. Firstly, it introduces Bitcoin and 
cryptocurrency, then it deals with web vulnerabilities (XSS and CSRF) before 
combining both of them in order to build the exploit.

One small change which could be made is reversing the order of the web 
vulnerabilities in section 3 since the paragraph begins with XSS and ends with 
XSRF. Furthemore, the subject deals with XSS (more than XSRF even though this 
is relevant).

Some acronyms are used in this report without any "translation". Here are some 
examples: XSS and XSRF are not explained until section 3 and are really often 
used, ASIC, FPGA.

Explanation (or reference) about Getwork protocol is missing.

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

The template used is a LaTeX article documentclass template which is suitable 
for this kind of report. It is scientific since lots of report use LaTeX as a 
tool for writing thesis or whatever. Thus, fonts and layout are easy to read.

A web link is going outside the right margin in section 3.

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

There isn't any illustration (nor figure) in this report. As stated above (in 
the first part of this peer-review), some figures about the architecture 
developed and interaction protocol between attacker, victims, web server 
(vulnerable to XSS), proxy, etc. might be done. A sequence diagram could be 
helpful in order to understand each step of the exploit:
1. Attacker injects malicious code through the vulnerable server (via CSRF or 
XSS directly). By the way, nothing has been written about different types of 
XSS: stored or reflected. This has an impact on the way the attacker will trick 
the victim(s) and it may be useful to deal with it.
2. Victim visits the website
3. Victim's browser connect through the attacker proxy
... and so on

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

In order to understand the full report, it was necessary to have a look at 
references and links anchored. That's what it stands for so we didn't have any 
difficulties.

One sentence sounds a bit strange in section 2 paragraph 3 "Because each block 
increases the difficulty for the next, pools of miners are more efficient and 
can distribute work appropriately". We didn't get the meaning of this sentence, 
why a chain block would increase the difficulty (of computation we assume ?) of 
the next (chain blocks are linked together ?) chain block we suppose (we didn't 
know exactly what "next" was referencing). Furthermore, why a distributed 
mining system would make the mining more efficient ?

The overall language and tone of the document is suitable for a scientific 
report. There isn't any spelling nor grammar mistakes except a small typing 
mistake in section 2 paragraph 1 with a double "a" typed in the sentence "These 
are stored instead in a a block chain".

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

References are correctly formatted and all cited in the text. Some URL are 
missing for some of them though.

We couldn't reach the first reference (we might have badly copied and pasted) 
but all references were either scientific papers or official organizations 
website (W3C, bitcoin). OWASP 
(https://www.owasp.org/index.php/Cross-site_Scripting_%28XSS%29) is missing in 
the list unfortunately and this is maybe one relevant references to add when 
one is dealing with web security vulnerability.

References used are interesting and support what is written in the report. Some 
more references about bitcoins and how it works may have given more 
understandings on Cryptocurrency.

===

7. Scientific Rigour

Consider the following questions:

    * Is the reasoning sound? Does it follow the scientific method?
    * Does the experiments, if any, support the reasoning?
    * What changes would you suggest to improve the scientific rigour of
the report?

===

The reasoning is interesting but we don't have any clue about what have been 
done in the practical part of this report. It may be a good idea to add some 
sources (code) and practical documentation about the malicious javascript 
payload which has been developed (in appendix for instance). Some screenshots 
of the ongoing packets from the victim browser until the proxy would give a 
more concrete overview of the research and it will clearly give credits to the 
proof of concept you built.

===
