<?php
KLoader::addAdapter(new ComLearnLoaderAdapterYaml(JPATH_BASE));
KLoader::addAdapter(new ComLearnLoaderAdapterMarkdown(JPATH_BASE));

echo KFactory::get('com://admin/learn.dispatcher')->dispatch();