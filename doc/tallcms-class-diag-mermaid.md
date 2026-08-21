classDiagram
direction BT
class Banner {
    casts
    fillable
   category() 
   registerMediaCollections() 
   registerMediaConversions(media) 
}
class BannerCategory {
    casts
    fillable
    table
   banners() 
}
class BannerCategoryPolicy {
   deleteAny(user) 
   delete(user, bannerCategory) 
   reorder(user) 
   create(user) 
   update(user, bannerCategory) 
   restoreAny(user) 
   view(user, bannerCategory) 
   restore(user, bannerCategory) 
   viewAny(user) 
   replicate(user, bannerCategory) 
   forceDeleteAny(user) 
   forceDelete(user, bannerCategory) 
}
class BannerCategoryResource {
    navigationSort
    navigationIcon
    recordTitleAttribute
    navigationGroup
    model
    navigationLabel
   table(table) 
   getRelations() 
   infolist(infolist) 
   form(form) 
   getPages() 
}
class BannerPolicy {
   deleteAny(user) 
   delete(user, banner) 
   reorder(user) 
   create(user) 
   update(user, banner) 
   restoreAny(user) 
   view(user, banner) 
   restore(user, banner) 
   viewAny(user) 
   replicate(user, banner) 
   forceDeleteAny(user) 
   forceDelete(user, banner) 
}
class BannerResource {
    navigationSort
    navigationIcon
    model
    globalSearchResultsLimit
   table(table) 
   getLastSortValue() 
   form(form) 
   getPages() 
   getGlobalSearchResultDetails(record) 
   getNavigationGroup() 
   getGlobalSearchResultTitle(record) 
   getGloballySearchableAttributes() 
   getGlobalSearchEloquentQuery() 
   getRelations() 
}
class Category {
    casts
    fillable
    table
   posts() 
}
class CategoryPolicy {
   deleteAny(user) 
   delete(user, category) 
   reorder(user) 
   create(user) 
   update(user, category) 
   restoreAny(user) 
   view(user, category) 
   restore(user, category) 
   viewAny(user) 
   replicate(user, category) 
   forceDeleteAny(user) 
   forceDelete(user, category) 
}
class CategoryResource {
    navigationSort
    navigationIcon
    recordTitleAttribute
    model
    slug
   table(table) 
   getRelations() 
   infolist(infolist) 
   form(form) 
   getPages() 
   getNavigationGroup() 
}
class Post {
    casts
    fillable
    table
   category() 
   author() 
}
class PostPolicy {
   deleteAny(user) 
   delete(user, post) 
   reorder(user) 
   create(user) 
   update(user, post) 
   restoreAny(user) 
   view(user, post) 
   restore(user, post) 
   viewAny(user) 
   replicate(user, post) 
   forceDeleteAny(user) 
   forceDelete(user, post) 
}
class PostResource {
    navigationIcon
    navigationSort
    recordTitleAttribute
    model
    slug
   table(table) 
   getRelations() 
   form(form) 
   getPages() 
   getNavigationGroup() 
}
class User {
    hidden
    casts
    fillable
   getFilamentAvatarUrl() 
   getNameAttribute() 
   isSuperAdmin() 
   canAccessPanel(panel) 
   getFilamentName() 
   registerMediaConversions(media) 
}
class UserFactory {
    password
   unverified() 
   definition() 
}
class UserPolicy {
   deleteAny(user) 
   delete(user) 
   reorder(user) 
   create(user) 
   update(user) 
   restoreAny(user) 
   view(user) 
   restore(user) 
   viewAny(user) 
   replicate(user) 
   forceDeleteAny(user) 
   forceDelete(user) 
}
class UserResource {
    navigationSort
    navigationIcon
    navigationGroup
    model
    globalSearchResultsLimit
   table(table) 
   getRelations() 
   doResendEmailVerification(settings, user) 
   form(form) 
   getPages() 
   getGlobalSearchResultDetails(record) 
   getNavigationGroup() 
   getGlobalSearchResultTitle(record) 
   getGloballySearchableAttributes() 
}
class tallcms

