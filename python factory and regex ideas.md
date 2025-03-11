### regexfactory.py
```py
with open("regex", 'w+') as f:
  for char in range(2**8):
    low = "{:02d}".format(char % 256)
    high = "{:02d}".format((char + 1) % 256)
    f.write(f"(?<=\^){low}[^{high}]+({high})([^+]+\+)"+"{2}|")
    f.write(f"(?<=\^){high}[^{low}]+({low})([^+]+\+)"+"{2}|")
```
## fix bf-regex
- [x] + in a general way \1(.)
- [x] - in a general way (.)\1
- [x] > and <
- [ ] , could take the very next as input 
- [ ] last double newline divides the regex into (buffer, byte atlas, bf code, input)
-----
#### Goal
- [ ] You can use the same regex and by following the syntax of the string;
if not followed the string wont match; this way



### regex syntax idea
```clojure
\^([\000-\255])[^\1]*(?:\1([^\n])|^.)[^+]+\+|\^([\000-\255])[^\1]*(?:(.)\1|(.)$)[^-]+\-

(?<=\^)[^\000]|
[^[]+\[[^][]*+(?:(?R)[^][]*)*+\]|
(\[([^^]*\^[^^]*)])
(?<=\^)\000[^\001]+(\001)([^+]+\+){2}|
(?<=\^)\001[^\000]+(\000)([^-]+-){2}|
((?<=\^)[\000-\255]\s+()[\000-\255]|()[\000-\255]\s+(?<=\^)[\000-\255])([^>]+>){2}|
(()[\000-\255]\s+(?<=\^)[\000-\255]|(?<=\^)[\000-\255]\s+()[\000-\255])([^<]+<){2}|

(?<=\^)([\000-\255])[^.]+\.|
(?<=\^)([\000-\255])[^,]+,[\000-\255]
```

## Handling of Parenthesis

First trim comments and whitespace

```brainfuck
[-343-a-3a-<-v+[anvbaboa+[
asd3<<002>>>+av+[s]+a+v++a+]]]
```

```clojure
[^+\-<>\][]
```


First compile it
```clojure
(?<!(?<sd>[\0-\xFF]))\(.+\)(?!\k<sd>)
```

match and replace until out of matches

```brainfuck
[-343-a-3a--v+[anvbaboa+[asd3002+av+[s]+a+v++a+]]]
```

match over compiled version


```clojure
((?<lok>[a-z])\^\[).+?(\]\k<lok>)
```

```brainfuck
{++++(++++++(+++)+)}
```

all bytes going into the character atlas
```
ĀāĂăĄąĆ	
 !"#$%&'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~ ¡¢£¤¥¦§¨©ª«¬­®¯°±²³´µ¶·¸¹º»¼½¾¿ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõö÷øùúûüýþÿ
```

