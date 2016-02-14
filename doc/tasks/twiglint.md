# TwigLint

The TwigLint task will lint all your twig files.
It lives under the `twiglint` namespace and has following configurable parameters:

```yaml
# grumphp.yml
parameters:
    tasks:
        twiglint:
            ignore_patterns: []
```

**ignore_patterns**

*Default: []*

This is a list of patterns that will be ignored by the linter.
With this option you can skip files like test fixtures. Leave this option blank to run the linter for every twig file.
