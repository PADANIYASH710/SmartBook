<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Advanced Blogger Editor Pro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="CSS/dialog.css">
    <link rel="stylesheet" href="CSS/editor.css">

</head>

<body>

<header class="editor-topbar">

    <div class="container-fluid">

        <div class="topbar-wrapper">

            <div class="editor-left">

                <div class="editor-logo">

                    <i class="bi bi-journal-richtext"></i>

                </div>

                <input
                    type="text"
                    id="postTitle"
                    id="postTitle"
                    class="title-input"
                    placeholder="Write your post title..."
                >

            </div>

            <div class="editor-right">

                <button type="button" class="publish-btn">
                    <i class="bi bi-cloud-arrow-up"></i>
                    <span>Publish</span>
                </button>

            </div>

        </div>

    </div>

</header>

<div class="editor-wrapper">

    <div class="editor-card">

        <div class="toolbar">

            <div class="tool-group">

                <button type="button" data-cmd="undo" title="Undo">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </button>

                <button type="button" data-cmd="redo" title="Redo">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>

            </div>

            <div class="toolbar-divider"></div>

            <div class="tool-group">

                <button type="button" data-cmd="bold" title="Bold">
                    <i class="bi bi-type-bold"></i>
                </button>

                <button type="button" data-cmd="italic" title="Italic">
                    <i class="bi bi-type-italic"></i>
                </button>

                <button type="button" data-cmd="underline" title="Underline">
                    <i class="bi bi-type-underline"></i>
                </button>

                <button type="button" data-cmd="strikeThrough" title="Strike Through">
                    <i class="bi bi-type-strikethrough"></i>
                </button>

            </div>

            <div class="toolbar-divider"></div>

            <div class="tool-group">

                <select id="fontFamily" title="Font Family">

                    <option value="">Font</option>

                    <option value="Arial">Arial</option>

                    <option value="Times New Roman">Times New Roman</option>

                    <option value="Calibri">Calibri</option>

                    <option value="Georgia">Georgia</option>

                    <option value="Tahoma">Tahoma</option>

                    <option value="Verdana">Verdana</option>

                    <option value="Courier New">Courier New</option>

                    <option value="Poppins">Poppins</option>

                </select>

            </div>

            <div class="toolbar-divider"></div>

            <div class="tool-group">

                <select id="heading" title="Text Style">

                    <option value="">Paragraph</option>

                    <option value="H2">Heading</option>

                    <option value="H3">Sub Heading</option>

                    <option value="H4">Small Heading</option>

                    <option value="H5">Minor Heading</option>

                    <option value="P">Normal</option>

                </select>

            </div>

            <div class="toolbar-divider"></div>

            <div class="tool-group">

                <label class="tool-upload image-tool" title="Insert Image">

                    <i class="bi bi-image"></i>

                    <input
                        type="file"
                        id="imageUpload"
                        accept="image/*"
                        hidden>

                </label>

                <label class="tool-upload video-tool" title="Insert Video">

                    <i class="bi bi-camera-video"></i>

                    <input
                        type="file"
                        id="videoUpload"
                        accept="video/*"
                        hidden>

                </label>

            </div>

            <div class="toolbar-divider"></div>

            <div class="tool-group">

                <label class="color-tool" title="Text Color">

                    <i class="bi bi-fonts"></i>

                    <input
                        type="color"
                        id="textColor"
                        value="#000000">

                </label>

                <label class="color-tool" title="Highlight Color">

                    <i class="bi bi-highlighter"></i>

                    <input
                        type="color"
                        id="highlightColor"
                        value="#ffff00">

                </label>

            </div>

            <div class="toolbar-divider"></div>

            <div class="tool-group">

                <button type="button" data-cmd="justifyLeft" title="Align Left">
                    <i class="bi bi-text-left"></i>
                </button>

                <button type="button" data-cmd="justifyCenter" title="Align Center">
                    <i class="bi bi-text-center"></i>
                </button>

                <button type="button" data-cmd="justifyRight" title="Align Right">
                    <i class="bi bi-text-right"></i>
                </button>

                <button type="button" data-cmd="justifyFull" title="Justify">
                    <i class="bi bi-justify"></i>
                </button>

            </div>

            <div class="toolbar-divider"></div>

            <div class="tool-group">

                <button type="button" data-cmd="insertUnorderedList" title="Bullet List">
                    <i class="bi bi-list-ul"></i>
                </button>

                <button type="button" data-cmd="insertOrderedList" title="Number List">
                    <i class="bi bi-list-ol"></i>
                </button>

                <button type="button" data-cmd="indent" title="Increase Indent">
                    <i class="bi bi-text-indent-left"></i>
                </button>

                <button type="button" data-cmd="outdent" title="Decrease Indent">
                    <i class="bi bi-text-indent-right"></i>
                </button>

            </div>

            <div class="toolbar-divider"></div>

            <div class="tool-group">

                <button type="button" data-cmd="superscript" title="Superscript">
                    <i class="bi bi-superscript"></i>
                </button>

                <button type="button" data-cmd="subscript" title="Subscript">
                    <i class="bi bi-subscript"></i>
                </button>

            </div>

            <div class="toolbar-divider"></div>

            <div class="tool-group">

                <button type="button" id="addLink" title="Insert Link">
                    <i class="bi bi-link-45deg"></i>
                </button>

                <button type="button" id="blockquote" title="Blockquote">
                    <i class="bi bi-quote"></i>
                </button>

                <button type="button" id="horizontalLine" title="Horizontal Line">
                    <i class="bi bi-dash-lg"></i>
                </button>

            </div>

            <div class="toolbar-divider"></div>

            <div class="tool-group">

                <button type="button" id="htmlToggle" title="HTML Editor">
                    <i class="bi bi-code-slash"></i>
                </button>

                <button type="button" id="clearEditor" title="Clear Editor">
                    <i class="bi bi-trash3"></i>
                </button>

                <button type="button" id="postSettingsBtn" title="Post Settings">
                    <i class="bi bi-sliders"></i>
                </button>

            </div>

        </div>

        <br><div class="html-box">

            <div class="html-header">

                <div class="html-title">

                    <i class="bi bi-code-slash"></i>

                    <span>
                        HTML Editor
                    </span>

                </div>

                <button type="button" class="close-html" id="closeHTML">
                    <i class="bi bi-x-lg"></i>
                </button>

            </div>

            <textarea id="htmlInput" placeholder="Paste your HTML code here..."></textarea>

            <div class="html-footer">

                <button type="button" class="btn btn-primary" id="insertHTML">
                    <i class="bi bi-check-circle"></i>
                    Insert HTML
                </button>

            </div>

        </div>

        <div class="editor-container">

            <div id="editor" class="editor" contenteditable="true"></div>

        </div>

    </div>

</div>

<div class="settings-overlay"></div>

<div class="settings-modal">

    <div class="settings-header">

        <div>

            <h4>
                <i class="bi bi-sliders"></i>
                Post Settings
            </h4>

            <small>
                Customize your article before publishing.
            </small>

        </div>

        <button type="button" id="closeSettings">
            <i class="bi bi-x-lg"></i>
        </button>

    </div>

    <div class="settings-body">

        <div class="setting-group">

            <label>
                Cover Image
            </label>

            <div class="cover-preview-box">

                <img
                    id="coverPreview"
                    src="BACK-END/UPLOADS/COVERS/default_cover.png"
                    alt="Cover Image">

            </div>

            <label class="upload-cover-btn">
                <i class="bi bi-image"></i>
                Upload Cover
                <input
                    type="file"
                    id="coverImageUpload"
                    accept="image/*"
                    hidden>
            </label>

        </div>

        <div class="setting-group">

            <label>Category</label>

            <select id="postCategory" class="form-select">

                <option value="">Select Category</option>

                <option value="Education">Education</option>

                <option value="News">News</option>

                <option value="Programming">Programming</option>

                <option value="Technology">Technology</option>

                <option value="Science">Science</option>

                <option value="History">History</option>

                <option value="General Knowledge">General Knowledge</option>

                <option value="Environment">Environment</option>

                <option value="Geography">Geography</option>
                
                <option value="Sports">Sports</option>

            </select>

        </div>

        <div class="setting-group">

            <label>Meta Description</label>

            <textarea
                id="metaDescription"
                class="form-control"
                placeholder="Write a short SEO friendly description..."></textarea>

        </div>

    </div>

</div>

<?php include 'dialog.php'; ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="JS/security.js"></script>
<script src="JS/dialog.js"></script>
<script src="JS/edit_post.js"></script>
<script src="JS/create_post.js"></script>

</body>

</html>