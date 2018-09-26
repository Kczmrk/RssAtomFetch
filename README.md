# RssAtomFetch - simple PHP CLI application to fetch RSS/Atom feed and save it to .csv file

## Installing
1. `git clone`
2. `composer install`
3. CLI file - `src/console.php`

## Commands avaliable
1. `csv:simple URL PATH` - Fetch RSS/Atom feed from URL and saves it to PATH file (removes old feed if exists)
2. `csv:extended URL PATH` - Fetch RSS/Atom feed from URL and saves it to PATH file (doesn't remove old feed if exists)

## Use example
```bash
$ php src/console.php csv:simple http://feeds.nationalgeographic.com/ng/News/News_Main eksport_prosty.csv`
```
## Testing
```bash
$ phpunit
```
