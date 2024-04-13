import {defineConfig} from 'vitepress'

export default defineConfig({
  title: 'Empty Coalesce Plugin',
  description: 'Documentation for the Empty Coalesce plugin',
  base: '/docs/empty-coalesce/',
  lang: 'en-US',
  head: [
    ['meta', {content: 'https://github.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://twitter.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://youtube.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://www.facebook.com/newyorkstudio107', property: 'og:see_also',}],
  ],
  themeConfig: {
    socialLinks: [
      {icon: 'github', link: 'https://github.com/nystudio107'},
      {icon: 'twitter', link: 'https://twitter.com/nystudio107'},
    ],
    logo: '/img/plugin-logo.svg',
    editLink: {
      pattern: 'https://github.com/nystudio107/craft-emptycoalesce/edit/develop-v5/docs/docs/:path',
      text: 'Edit this page on GitHub'
    },
    algolia: {
      appId: 'L15LEW8LWP',
      apiKey: '39198fa2e54d3da8c644d9cd241cff5a',
      indexName: 'nystudio107-empty-coalesce',
      searchParameters: {
        facetFilters: ["version:v5"],
      },
    },
    lastUpdatedText: 'Last Updated',
    sidebar: [],
    nav: [
      {text: 'Home', link: 'https://nystudio107.com/plugins/empty-coalesce'},
      {text: 'Store', link: 'https://plugins.craftcms.com/empty-coalesce'},
      {text: 'Changelog', link: 'https://nystudio107.com/plugins/empty-coalesce/changelog'},
      {text: 'Issues', link: 'https://github.com/nystudio107/craft-empty-coalesce/issues'},
      {
        text: 'v5', items: [
          {text: 'v5', link: '/'},
          {text: 'v4', link: 'https://nystudio107.com/docs/empty-coalesce/v4/'},
          {text: 'v1', link: 'https://nystudio107.com/docs/empty-coalesce/v1/'},
        ],
      },
    ]
  },
});
