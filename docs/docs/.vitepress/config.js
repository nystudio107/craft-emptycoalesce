module.exports = {
  title: 'Empty Coalesce Plugin Documentation',
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
    repo: 'nystudio107/craft-emptycoalesce',
    docsDir: 'docs/docs',
    docsBranch: 'v1',
    algolia: {
      appId: 'L15LEW8LWP',
      apiKey: '39198fa2e54d3da8c644d9cd241cff5a',
      indexName: 'nystudio107-empty-coalesce'
    },
    editLinks: true,
    editLinkText: 'Edit this page on GitHub',
    lastUpdated: 'Last Updated',
    sidebar: 'auto',
  },
};
