from mysql import connector
from lxml.html import fromstring as etree_fromstring
import requests
from sys import argv


def IsAuthorPresent(name: str):
	"""
	Checks for the presence of a Author in the database.
	@param name := Name of the author to check for
	@return := boolean indicating presence
	"""
	pass


def IsSeriesPresent(name: str):
	"""
	Checks for the presence of a Series in the database.
	@param name := Name of the series to check for
	@return := boolean indicating presence
	"""
	pass


def InsertAuthor(details: dict):
	pass


def InsertBook(details: dict):
	pass



def ParseBook(book):
	"""
	This function recives a etree of the book and parses it to get the imformation needed.
	It parses all the webpage and creates a dictionary and send it to InsertBook to insert the row
	"""
	TITLE_XPATH = "//*[@id='bookTitle']/text()"
	SERIES_XPATH = ""
	NUMBER_XPATH = ""
	DESC_XPATH = "//*[@id='description']/span[2]/text()"
	PICTURE_XPATH = ""

	book_info = {}
	book_info["name"] = book.xpath(TITLE_XPATH)[0].strip()

	description = book.xpath(DESC_XPATH)
	if description:
		book_info["description"] = description
	else:
		book_info["description"] = "Description not provided"

	
	pass


def getAllBooks(url: str):
	req = requests.get(url)
	etree = etree_fromstring(req.text)

	BOOKS_XPATH = "//*[@class='responsiveBook__media']/a"

	for book in etree.xpath(BOOKS_XPATH):
		book_url = f"https://www.goodreads.com/{book.xpath('./@href')[0]}"
		print(f"Parsing {book_url}")
		book = requests.get(book_url)
		ParseBook(etree_fromstring(book.text))




if __name__ == '__main__':
	# Get done with the database connection before anything
	dbConnection = connector.connect(
		database="bookstore",
		user="bookstore",
		passwd="bookstore",
		host="127.0.0.1"
	)
	getAllBooks(argv[1])
