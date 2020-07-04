from PIL import Image
import os

files = []

print("Listing files . . .")
for r, d, f in os.walk('..\\ressources\\products\\'):
    for file in f:
        if file.endswith(".png") or file.endswith(".jpg") or file.endswith(".jpeg") or file.endswith(".webp") or file.endswith(".gif"):
            if "_small" not in file:
                files.append(os.path.join(r, file))

max = len(files)
for f in files:
    print("Editing file - " + str(files.index(f)) + "/" + str(max) + " - " + f.split("\\")[-1])
    img = Image.open(f)
    img = img.resize((round(img.width/4), round(img.height/4)))
    img.save(f.replace(f.split("\\")[-1], "") + f.split("\\")[-1].replace(".", "_small."))
