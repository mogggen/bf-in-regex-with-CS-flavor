![image](https://github.com/user-attachments/assets/d28f9a1b-511a-4cc3-a492-48b037208829)


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

If possible the entire promt(s) will be written out below, if not, I will argue what obstacle I ran into

first attempt: https://regex101.com/r/AaTOUs/1

+ operator for x00 https://regex101.com/r/kEZyX3/1

+- works for 00-0F https://regex101.com/r/EGgD8u/1

Restated:
using base 256 instead of hex to avoid converting to 256 later: https://regex101.com/r/JHCtzP/1

Actual progress: https://regex101.com/r/JHCtzP/4

Can use \000 \001 \002 \003 \004 \005 \006 \007 for Control characters: https://regex101.com/r/JHCtzP/5
