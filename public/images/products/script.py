import urllib.request
from PIL import Image
import numpy as np
import pandas as pd
import cv2

dataframe = pd.read_csv('products.csv', sep=r'\s*,\s*')
urlimg_download = dataframe['image_url']
print(urlimg_download)
name = dataframe['id']
number_of_row = len(dataframe)
work_path = '.'
for x in range(0, number_of_row - 1):
    image_url = urlimg_download[x]
    save_name = name[x]
    urllib.request.urlretrieve(image_url, save_name + ".png")