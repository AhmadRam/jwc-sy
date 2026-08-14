import zipfile
import xml.etree.ElementTree as ET
import sys
import io

# Fix encoding for Windows console
sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

def read_docx(file_path):
    try:
        with zipfile.ZipFile(file_path) as docx:
            xml_content = docx.read('word/document.xml')
            tree = ET.XML(xml_content)
            
            namespace = {'w': 'http://schemas.openxmlformats.org/wordprocessingml/2006/main'}
            
            paragraphs = []
            for paragraph in tree.iterfind('.//w:p', namespace):
                texts = [node.text for node in paragraph.iterfind('.//w:t', namespace) if node.text]
                if texts:
                    paragraphs.append(''.join(texts))
            
            return '\n'.join(paragraphs)
    except Exception as e:
        return str(e)

file_path = r"C:\Users\EngAhmadRam\Downloads\شركة JWC للحلول الإدارية copy.docx"
content = read_docx(file_path)

with open('docx_content.txt', 'w', encoding='utf-8') as f:
    f.write(content)

print("Done")
