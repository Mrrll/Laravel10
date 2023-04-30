import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor'

import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials'
import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold'
import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic'
import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph'

import SourceEditing from '@ckeditor/ckeditor5-source-editing/src/sourceediting'
import Heading from '@ckeditor/ckeditor5-heading/src/heading'
import Link from '@ckeditor/ckeditor5-link/src/link'
import AutoLink from '@ckeditor/ckeditor5-link/src/autolink'
import Font from '@ckeditor/ckeditor5-font/src/font'
import Underline from '@ckeditor/ckeditor5-basic-styles/src/underline'
import Strikethrough from '@ckeditor/ckeditor5-basic-styles/src/strikethrough'
import Code from '@ckeditor/ckeditor5-basic-styles/src/code'
import Subscript from '@ckeditor/ckeditor5-basic-styles/src/subscript'
import Superscript from '@ckeditor/ckeditor5-basic-styles/src/superscript'
import RemoveFormat from '@ckeditor/ckeditor5-remove-format/src/removeformat'
import Autoformat from '@ckeditor/ckeditor5-autoformat/src/autoformat'
import Alignment from '@ckeditor/ckeditor5-alignment/src/alignment'
import List from '@ckeditor/ckeditor5-list/src/list'
import TodoList from '@ckeditor/ckeditor5-list/src/todolist'
import Indent from '@ckeditor/ckeditor5-indent/src/indent'
import Image from '@ckeditor/ckeditor5-image/src/image'
import ImageToolbar from '@ckeditor/ckeditor5-image/src/imagetoolbar'
import ImageCaption from '@ckeditor/ckeditor5-image/src/imagecaption'
import ImageStyle from '@ckeditor/ckeditor5-image/src/imagestyle'
import ImageResize from '@ckeditor/ckeditor5-image/src/imageresize'
import LinkImage from '@ckeditor/ckeditor5-link/src/linkimage'
import ImageInsert from '@ckeditor/ckeditor5-image/src/imageinsert'
import AutoImage from '@ckeditor/ckeditor5-image/src/autoimage'
import MediaEmbed from '@ckeditor/ckeditor5-media-embed/src/mediaembed'
import CodeBlock from '@ckeditor/ckeditor5-code-block/src/codeblock'
import BlockQuote from '@ckeditor/ckeditor5-block-quote/src/blockquote'
import WordCount from '@ckeditor/ckeditor5-word-count/src/wordcount'

if (document.querySelector('#editor')) {
    ClassicEditor.create(document.querySelector('#editor'), {
      plugins: [
        Essentials,
        Paragraph,
        Bold,
        Italic,
        SourceEditing,
        Heading,
        Link,
        AutoLink,
        Font,
        Underline,
        Strikethrough,
        Code,
        Subscript,
        Superscript,
        RemoveFormat,
        Autoformat,
        Alignment,
        List,
        TodoList,
        Indent,
        Image,
        ImageToolbar,
        ImageCaption,
        ImageStyle,
        ImageResize,
        LinkImage,
        ImageInsert,
        AutoImage,
        MediaEmbed,
        CodeBlock,
        BlockQuote,
        WordCount,
      ],
      image: {
        toolbar: [
          'imageStyle:block',
          'imageStyle:side',
          '|',
          'toggleImageCaption',
          'imageTextAlternative',
          '|',
          'linkImage',
        ],
      },
      codeBlock: {
        languages: [
          // Do not render the CSS class for the plain text code blocks.
          { language: 'plaintext', label: 'Plain text', class: '' },

          // Use the "php-code" class for PHP code blocks.
          { language: 'php', label: 'PHP', class: 'php-code' },

          // Use the "js" class for JavaScript code blocks.
          // Note that only the first ("js") class will determine the language of the block when loading data.
          {
            language: 'javascript',
            label: 'JavaScript',
            class: 'js javascript js-code',
          },

          // Python code blocks will have the default "language-python" CSS class.
          { language: 'python', label: 'Python' },
        ],
      },
      toolbar: {
        items: [
          'sourceEditing',
          '|',
          'heading',
          '|',
          'link',
          '|',
          {
            label: 'Font',
            icon: 'text',
            items: ['fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'],
          },
          '|',
          'bold',
          'italic',
          'underline',
          {
            label: 'Formatting',
            icon: 'plus',
            items: ['strikethrough', 'subscript', 'superscript', 'code'],
          },
          'removeFormat',
          '|',
          'alignment',
          {
            label: 'List',
            icon:
              '<svg width="16px" height="16px" viewBox="0 -3 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"/><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/><g id="SVGRepo_iconCarrier"> <title>list [#1497]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-179.000000, -322.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M124.575,174 C123.7056,174 123,174.672 123,175.5 C123,176.328 123.7056,177 124.575,177 C125.4444,177 126.15,176.328 126.15,175.5 C126.15,174.672 125.4444,174 124.575,174 L124.575,174 Z M128.25,177 L144,177 L144,175 L128.25,175 L128.25,177 Z M124.575,168 C123.7056,168 123,168.672 123,169.5 C123,170.328 123.7056,171 124.575,171 C125.4444,171 126.15,170.328 126.15,169.5 C126.15,168.672 125.4444,168 124.575,168 L124.575,168 Z M128.25,171 L144,171 L144,169 L128.25,169 L128.25,171 Z M124.575,162 C123.7056,162 123,162.672 123,163.5 C123,164.328 123.7056,165 124.575,165 C125.4444,165 126.15,164.328 126.15,163.5 C126.15,162.672 125.4444,162 124.575,162 L124.575,162 Z M128.25,165 L144,165 L144,163 L128.25,163 L128.25,165 Z" id="list-[#1497]"> </path> </g> </g> </g> </g></svg>',
            items: ['bulletedList', 'numberedList', 'todoList'],
          },
          'outdent',
          'indent',
          '|',
          'insertImage',
          'mediaEmbed',
          '|',
          'codeBlock',
          'blockQuote',
        ],
        shouldNotGroupWhenFull: true,
      },
    })
      .then((editor) => {
        console.log('Editor was initialized', editor)
        const wordCountPlugin = editor.plugins.get('WordCount')
        const wordCountWrapper = document.getElementById('word-count')
        // wordCountWrapper.appendChild(wordCountPlugin.wordCountContainer)
        editor.plugins.get('WordCount').on('update', (evt, stats) => {
            // Prints the current content statistics.
            wordCountWrapper.innerHTML = '<span class="me-1 badge bg-secondary bg-gradient">Characters: '+stats.characters+'</span><span class="me-1 badge bg-secondary bg-gradient">Words: '+stats.words+'</span>';
        })
      })
      .catch((error) => {
        console.error(error.stack)
      })
}
